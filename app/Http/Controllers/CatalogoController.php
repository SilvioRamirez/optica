<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Configuracion;
use App\Models\Producto;
use App\Models\Tasa;
use App\Models\PedidoCatalogo;
use App\Models\PedidoCatalogoItem;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class CatalogoController extends Controller
{
    /**
     * Muestra el catálogo de productos (solo productos marcados como externos)
     */
    public function index(Request $request): View
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        $configuracion = Configuracion::first();
        
        // Solo productos activos y marcados para mostrar en el catálogo externo
        $query = Producto::activo()->externo()->with('categoria');
        
        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }
        
        // Búsqueda por nombre
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }
        
        $productos = $query->orderBy('nombre', 'asc')->paginate(12);
        $tasa = Tasa::getLastTasa();
        
        return view('catalogo.index', compact('productos', 'categorias', 'tasa', 'configuracion'));
    }

    /**
     * Muestra el detalle de un producto
     */
    public function show(Producto $producto): View
    {
        $tasa = Tasa::getLastTasa();
        $configuracion = Configuracion::first();
        $productosRelacionados = Producto::activo()->externo()
            ->where('categoria_id', $producto->categoria_id)
            ->where('id', '!=', $producto->id)
            ->limit(4)
            ->get();
            
        return view('catalogo.show', compact('producto', 'tasa', 'productosRelacionados', 'configuracion'));
    }

    /**
     * Agregar producto al carrito (AJAX)
     */
    public function addToCart(Request $request): JsonResponse
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        
        if ($producto->stock < $request->cantidad) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficiente stock disponible'
            ], 400);
        }

        $cart = session()->get('cart', []);
        
        if (isset($cart[$producto->id])) {
            $cart[$producto->id]['cantidad'] += $request->cantidad;
        } else {
            // Guardar precio USD (BCV) con IVA ya calculado
            $cart[$producto->id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio_con_iva, // Precio USD BCV con IVA
                'precio_bs' => $producto->precio_bs,   // Precio en Bs con IVA
                'imagen' => $producto->imagen,
                'cantidad' => $request->cantidad
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'message' => 'Producto agregado al carrito',
            'cartCount' => $this->getCartCount(),
            'cartTotal' => $this->getCartTotal()
        ]);
    }

    /**
     * Quitar producto del carrito (AJAX)
     */
    public function removeFromCart(Request $request): JsonResponse
    {
        $request->validate([
            'producto_id' => 'required|integer'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->producto_id])) {
            unset($cart[$request->producto_id]);
            session()->put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Producto eliminado del carrito',
            'cartCount' => $this->getCartCount(),
            'cartTotal' => $this->getCartTotal()
        ]);
    }

    /**
     * Actualizar cantidad en el carrito (AJAX)
     */
    public function updateCart(Request $request): JsonResponse
    {
        $request->validate([
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer|min:0'
        ]);

        $cart = session()->get('cart', []);
        
        if ($request->cantidad == 0) {
            unset($cart[$request->producto_id]);
        } elseif (isset($cart[$request->producto_id])) {
            $producto = Producto::find($request->producto_id);
            if ($producto && $producto->stock >= $request->cantidad) {
                $cart[$request->producto_id]['cantidad'] = $request->cantidad;
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay suficiente stock disponible'
                ], 400);
            }
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'message' => 'Carrito actualizado',
            'cartCount' => $this->getCartCount(),
            'cartTotal' => $this->getCartTotal()
        ]);
    }

    /**
     * Mostrar el carrito
     */
    public function cart(): View
    {
        $cart = session()->get('cart', []);
        $tasa = Tasa::getLastTasa();
        $total = $this->getCartTotal();
        
        return view('catalogo.cart', compact('cart', 'tasa', 'total'));
    }

    /**
     * Mostrar formulario de checkout
     */
    public function checkout(): View|RedirectResponse
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('catalogo.index')
                ->with('warning', 'Tu carrito está vacío');
        }
        
        $tasa = Tasa::getLastTasa();
        $total = $this->getCartTotal();
        
        return view('catalogo.checkout', compact('cart', 'tasa', 'total'));
    }

    /**
     * Procesar el pedido
     */
    public function processOrder(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('catalogo.index')
                ->with('warning', 'Tu carrito está vacío');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'notas' => 'nullable|string|max:1000'
        ]);

        $tasa = Tasa::getLastTasa();
        $totalUsd = $this->getCartTotal();
        $totalBs = $this->getCartTotalBs();

        // Generar número de pedido único
        $numeroPedido = 'CAT-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

        // Crear el pedido
        $pedido = PedidoCatalogo::create([
            'numero_pedido' => $numeroPedido,
            'nombre_cliente' => $request->nombre,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'notas' => $request->notas,
            'total_usd' => $totalUsd,
            'total_bs' => $totalBs,
            'tasa_cambio' => $tasa ? $tasa->valor : 0,
            'status' => 'pendiente'
        ]);

        // Crear los items del pedido (precio ya viene con IVA incluido)
        foreach ($cart as $item) {
            PedidoCatalogoItem::create([
                'pedido_catalogo_id' => $pedido->id,
                'producto_id' => $item['id'],
                'nombre_producto' => $item['nombre'],
                'precio_unitario' => $item['precio'], // Precio USD BCV con IVA
                'cantidad' => $item['cantidad'],
                'subtotal' => $item['precio'] * $item['cantidad']
            ]);
        }

        // Limpiar el carrito
        session()->forget('cart');

        return redirect()->route('catalogo.orden.success', $pedido->id)
            ->with('success', '¡Pedido realizado con éxito!');
    }

    /**
     * Mostrar confirmación del pedido
     */
    public function orderSuccess(PedidoCatalogo $pedido): View
    {
        $pedido->load('items');
        return view('catalogo.order-success', compact('pedido'));
    }

    /**
     * Obtener cantidad total de items en el carrito
     */
    private function getCartCount(): int
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'cantidad'));
    }

    /**
     * Obtener total del carrito en USD (BCV)
     */
    private function getCartTotal(): float
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        
        return $total;
    }

    /**
     * Obtener total del carrito en Bolívares
     */
    private function getCartTotalBs(): float
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            // Usar precio_bs si existe, sino calcular desde el producto
            if (isset($item['precio_bs'])) {
                $total += $item['precio_bs'] * $item['cantidad'];
            } else {
                $producto = Producto::find($item['id']);
                if ($producto) {
                    $total += $producto->precio_bs * $item['cantidad'];
                }
            }
        }
        
        return $total;
    }

    /**
     * API para obtener datos del carrito (AJAX)
     */
    public function getCartData(): JsonResponse
    {
        $cart = session()->get('cart', []);
        $tasa = Tasa::getLastTasa();
        $totalUsd = $this->getCartTotal();
        $totalBs = $this->getCartTotalBs();
        
        return response()->json([
            'items' => array_values($cart),
            'count' => $this->getCartCount(),
            'totalUsd' => $totalUsd,
            'totalBs' => $totalBs,
            'tasa' => $tasa ? $tasa->valor : 0
        ]);
    }
}


