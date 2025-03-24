<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'paciente-list',
            'paciente-create',
            'paciente-edit',
            'paciente-delete',
            'configuracion-list',
            'configuracion-create',
            'configuracion-edit',
            'configuracion-delete',
            'formulario-list',
            'formulario-create',
            'formulario-edit',
            'formulario-delete',
            'formulario-download',
            'formulario-telefono',
            'formulario-estatus',
            'refractante-list',
            'refractante-create',
            'refractante-edit',
            'refractante-delete',
            'refractante-download',
            'refractante-telefono',
            'refractante-estatus',
            'tipo-list',
            'tipo-create',
            'tipo-edit',
            'tipo-delete',
            'tipo-download',
            'operativo-list',
            'operativo-create',
            'operativo-edit',
            'operativo-delete',
            'operativo-download',
            'laboratorio-list',
            'laboratorio-create',
            'laboratorio-edit',
            'laboratorio-delete',
            'laboratorio-download',
            'estatus-list',
            'estatus-create',
            'estatus-edit',
            'estatus-delete',
            'estatus-download',
            'tipo-lente-list',
            'tipo-lente-create',
            'tipo-lente-edit',
            'tipo-lente-delete',
            'tipo-lente-download',
            'tipo-tratamiento-list',
            'tipo-tratamiento-create',
            'tipo-tratamiento-edit',
            'tipo-tratamiento-delete',
            'tipo-tratamiento-download',
            'ruta-entrega-list',
            'ruta-entrega-create',
            'ruta-entrega-edit',
            'ruta-entrega-delete',
            'ruta-entrega-download',
            'gasto-operativo-list',
            'gasto-operativo-create',
            'gasto-operativo-edit',
            'gasto-operativo-delete',
            'gasto-operativo-download',
            'tipo-gasto-list',
            'tipo-gasto-create',
            'tipo-gasto-edit',
            'tipo-gasto-delete',
            'tipo-gasto-download',
            'pago-list',
            'pago-create',
            'pago-edit',
            'pago-delete',
            'pago-download',
            'descuento-list',
            'descuento-create',
            'descuento-edit',
            'descuento-delete',
            'descuento-download'
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
