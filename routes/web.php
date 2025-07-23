<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\FormularioPdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BioanalistaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\GastoOperativoController;
use App\Http\Controllers\ImagenContratoController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\LenteController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\OperativoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RefractanteController;
use App\Http\Controllers\RutaEntregaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\TipoGastoController;
use App\Http\Controllers\TipoLenteController;
use App\Http\Controllers\TipoTratamientoController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\OrigenController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;

use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/consulta', [IndexController::class, 'consulta'])->name('consulta');
Route::get('/politica-privacidad', [IndexController::class, 'politicaPrivacidad'])->name('politica.privacidad');
Route::get('/condiciones-servicio', [IndexController::class, 'condicionesServicio'])->name('condiciones.servicio');
Route::get('/acerca-de', [IndexController::class, 'acercaDe'])->name('acerca.de');
Route::get('/politica-eliminacion', [IndexController::class, 'politicaEliminacion'])->name('politica.eliminacion');
Route::get('/politica-whatsapp', [IndexController::class, 'politicaWhatsapp'])->name('politica.whatsapp');
Route::get('/facebook', [IndexController::class, 'facebook'])->name('facebook');
/* Route::get('/', [HomeController::class, 'index'])->name('index'); */

Route::get('/landing', function () {
    return view('landing.landing');
});

/* Auth::routes(['register' => false]); */

// Login and Logout Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

// Registration Routes...
/* Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']); */

// Password Reset Routes...
/* Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update'); */

// Confirm Password 
/* Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']); */

// Email Verification Routes...
/* Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend',  [VerificationController::class, 'resend'])->name('verification.resend'); */


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-municipios', [DropdownController::class, 'fetchMunicipio']);
Route::post('api/fetch-parroquias', [DropdownController::class, 'fetchParroquia']);
Route::post('api/fetch-laboratorios', [FormularioController::class, 'fetchLaboratorio']);
Route::post('api/fetch-tipo-tratamientos', [DropdownController::class, 'fetchTipoTratamientos']);

Route::get('/formularios/{formulario}/{orden}/qrcode/',   [FormularioPdfController::class, 'orden_qrcode'])->name('formulario.orden.qrcode');
Route::get('/formularios/cedula/',   [FormularioPdfController::class, 'orden_cedula'])->name('formulario.orden.cedula');
Route::post('/abono', [PagoController::class, 'abonoWeb'])->name('abono.web.store');
/* Route::get('test', fn () => phpinfo()); */

Route::group(['middleware' => ['auth']], function() {

    //Rutas de Configuracion
    Route::resource('configuracions', ConfiguracionController::class);
    
    //Rutas de Roles
    Route::get('/roles/{role}/delete',  [RoleController::class, 'delete'])->name('roles.delete');
    Route::resource('roles',            RoleController::class);

    //Rutas de Usuarios
    Route::get('/users/{user}/delete',  [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/ajax/create',    [UserController::class, 'ajax_create'])->name('users.ajax.create');
    Route::resource('users',            UserController::class);

    //Rutas de Pacientes y Resultados
    Route::get('/pacientes/{paciente}/resultados',  [PacienteController::class, 'resultados_index'])->name('pacientes.resultados.index');
    Route::post('/pacientes/resultados/store',      [PacienteController::class, 'resultados_store'])->name('pacientes.resultados.store');
    Route::get('/pacientes/resultados/destroy/{id}',[PacienteController::class, 'resultados_destroy'])->name('pacientes.resultados.destroy');

    //Rutas de ResultadosDetalle
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/',       [PacienteController::class, 'resultados_detalle_index'])->name('pacientes.resultados.detalles.index');
    Route::post('/pacientes/resultado/resultado_detalle/store/',            [PacienteController::class, 'resultados_detalle_store'])->name('pacientes.resultados.detalles.store');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/print/', [PacienteController::class, 'resultados_detalle_print'])->name('pacientes.resultados.detalles.print');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/pdf/',   [PacienteController::class, 'resultados_detalle_pdf'])->name('pacientes.resultados.detalles.pdf');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/cola/',  [PacienteController::class, 'resultados_detalle_cola'])->name('pacientes.resultados.detalles.cola');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/cola/delete',        [PacienteController::class, 'resultados_detalle_cola_delete'])->name('pacientes.resultados.detalles.cola.delete');
    
    Route::get('/pacientes/{paciente}/cola/delete', [PacienteController::class, 'paciente_resultados_cola_vaciar'])->name('paciente.resultados.cola.vaciar');
    Route::get('/pacientes/{paciente}/cola/pdf',    [PacienteController::class, 'paciente_resultados_cola_pdf'])->name('pacientes.resultados.cola.pdf');
    Route::get('/pacientes/{paciente}/delete',      [PacienteController::class, 'delete'])->name('pacientes.delete');

    //Pacientes Dashboard
    Route::get('/pacientes/{paciente}/dashboard',   [PacienteController::class, 'dashboard'])->name('pacientes.dashboard');
    
    //Pacientes - Direccion
    Route::get('/pacientes/{paciente}/direccion',   [PacienteController::class, 'direccion_create'])->name('pacientes.direccion.create');
    Route::post('/pacientes/direccion/store',       [PacienteController::class, 'direccion_store'])->name('pacientes.direccion.store');
    
    //Pacientes - Lentes
    Route::get('/pacientes/{paciente}/lente',       [PacienteController::class, 'lente_create'])->name('pacientes.lente.create');
    Route::post('/pacientes/lente/store',           [PacienteController::class, 'lente_store'])->name('pacientes.lente.store');
    Route::get('/pacientes/{lente}/lente/delete',   [PacienteController::class, 'lente_delete'])->name('pacientes.lente.delete');
    Route::get('/pacientes/{lente}/lente/show',     [PacienteController::class, 'lente_show'])->name('pacientes.lente.show');
    Route::get('/pacientes/{lente}/lente/edit',     [PacienteController::class, 'lente_edit'])->name('pacientes.lente.edit');
    Route::patch('/pacientes/{lente}/lente/update/',[PacienteController::class, 'lente_update'])->name('pacientes.lente.update');

    Route::resource('pacientes',                    PacienteController::class);

    //Rutas de Lentes
    Route::post('api/prLente/{lente}',              [LenteController::class, 'prLente']);
    Route::post('api/rvLente/{lente}',              [LenteController::class, 'rvLente']);
    Route::post('api/lbLente/{lente}',              [LenteController::class, 'lbLente']);
    Route::post('api/peLente/{lente}',              [LenteController::class, 'peLente']);
    Route::post('api/prepararLente/{lente}',        [LenteController::class, 'prepararLente']);
    Route::post('api/entregarLente/{lente}',        [LenteController::class, 'entregarLente']);
    Route::get('/lentes/prLentes',          [LenteController::class, 'prLentesIndex'])->name('lentes.index.pr');
    Route::get('/lentes/lbLentes',          [LenteController::class, 'lbLentesIndex'])->name('lentes.index.lb');
    Route::get('/lentes/peLentes',          [LenteController::class, 'peLentesIndex'])->name('lentes.index.pe');
    Route::get('/lentes/entLentes',         [LenteController::class, 'EntLentesIndex'])->name('lentes.index.ent');
    Route::get('/lentes/{lente}/delete',    [LenteController::class, 'delete'])->name('lentes.delete');
    Route::resource('lentes',               LenteController::class);

    //Rutas de Formularios
    Route::post('api/estatusFormulario/{formulario}',   [FormularioController::class, 'estatusFormulario']);
    Route::post('api/cambiarEstatus/{formulario}',  [FormularioController::class, 'cambiarEstatus']);

    Route::post('api/imagenesContrato/{formulario}',   [ImagenContratoController::class, 'show']);
    Route::post('api/imagenesContratoDelete/{formulario}',   [ImagenContratoController::class, 'destroy']);

    Route::get('/formularios/{formulario}/orden/pdf/',   [FormularioPdfController::class, 'orden_pdf'])->name('formulario.orden.pdf');
    

    Route::get('/formularios/{formulario}/delete',    [FormularioController::class, 'delete'])->name('formularios.delete');
    Route::resource('formularios', FormularioController::class);


    //Refractantes
    Route::get('/refractantes/{refractante}/delete',    [RefractanteController::class, 'delete'])->name('refractantes.delete');
    Route::resource('refractantes', RefractanteController::class);

    //Tipos de Pago
    Route::get('/tipos/{tipo}/delete',    [TipoController::class, 'delete'])->name('tipos.delete');
    Route::resource('tipos', TipoController::class); 

    //Tipos de Gastos
    Route::get('/tipoGastos/{tipoGasto}/delete',    [TipoGastoController::class, 'delete'])->name('tipoGastos.delete');
    Route::resource('tipoGastos', TipoGastoController::class);

    //Rutas de Gastos Operativos
    Route::get('/gastoOperativos/{gastoOperativo}/delete',    [GastoOperativoController::class, 'delete'])->name('gastoOperativos.delete');
    Route::resource('gastoOperativos', GastoOperativoController::class);

    //Rutas de Laboratorios
    Route::post('api/fetch-laboratorios',               [DropdownController::class, 'fetchLaboratorio']);
    Route::get('/laboratorios/{laboratorio}/delete',    [LaboratorioController::class, 'delete'])->name('laboratorios.delete');
    Route::resource('laboratorios',                     LaboratorioController::class);

    //Rutas de Personas

    Route::post('api/fetch-personas',   [PersonaController::class, 'fetchPersonas']);
    Route::get('api/datatablePersonas', [PersonaController::class, 'datatablePersonas']);
    
    Route::get('/personas/{persona}/delete',    [PersonaController::class, 'delete'])->name('personas.delete');
    Route::resource('personas',                 PersonaController::class);

    //Rutas de Operativos
    Route::post('api/consultaColaboradoresOperativo/{operativo}',   [OperativoController::class, 'consultaColaboradoresOperativo']);
    Route::get('/operativos/colaboradores',    [OperativoController::class, 'colaboradores'])->name('operativos.colaboradores');
    Route::post('/operativos/colaboradores',    [OperativoController::class, 'colaboradoresStore'])->name('operativos.colaboradores.store');
    Route::get('/operativos/{operativo}/delete',    [OperativoController::class, 'delete'])->name('operativos.delete');
    Route::resource('operativos',                   OperativoController::class);

    Route::get('operativos/{id}/pdf', [OperativoController::class, 'generatePdf'])->name('operativos.pdf');

    //Rutas de Operativos
    Route::get('/especialistas/{especialista}/delete',  [EspecialistaController::class, 'delete'])->name('especialistas.delete');
    Route::resource('especialistas',                    EspecialistaController::class);

    //Rutas de Tratamientos
    Route::get('/tratamientos/{tratamiento}/delete',    [TratamientoController::class, 'delete'])->name('tratamientos.delete');
    Route::resource('tratamientos',  TratamientoController::class);

    //Rutas de Estatus
    Route::get('/estatus/{estatus}/delete',    [EstatusController::class, 'delete'])->name('estatus.delete');
    Route::resource('estatus',  EstatusController::class);

    //Rutas de Tipo de Lentes
    Route::get('/tipoLentes/{tipoLente}/delete',    [TipoLenteController::class, 'delete'])->name('tipoLentes.delete');
    Route::resource('tipoLentes',  TipoLenteController::class);

    //Rutas de Tipo de Tratamientos
    Route::get('/tipoTratamientos/{tipoTratamiento}/delete',    [TipoTratamientoController::class, 'delete'])->name('tipoTratamientos.delete');
    Route::resource('tipoTratamientos',  TipoTratamientoController::class);

    //Rutas Carga Imagenes Contratos
    Route::resource('imagenContratos',  ImagenContratoController::class);

    //Consulta de pago
    Route::post('api/saldoFormulario/{formulario}',   [FormularioController::class, 'saldoFormulario']);

    //Consulta de gastos operativos
    Route::post('api/consultaGastosOperativo/{operativo}',   [OperativoController::class, 'consultaGastosOperativo']);

    //Rutas Pagos
    Route::resource('pagos',  PagoController::class);
    Route::post('api/consultaPagos/{formulario}',   [PagoController::class, 'consultaPagos']);
    Route::post('api/calculoPagos/{formulario}',   [PagoController::class, 'calculoPagos']);
    Route::post('api/pagoDelete/{pago}',   [PagoController::class, 'destroy']);
    Route::post('api/cargar-imagen-pago', [PagoController::class, 'cargarImagen']);
    Route::get('/rutaEntregas/{rutaEntrega}/delete',    [RutaEntregaController::class, 'delete'])->name('rutaEntregas.delete');
    Route::resource('rutaEntregas',  RutaEntregaController::class);

    

    Route::post('api/descuentoDelete/{descuento}',   [DescuentoController::class, 'destroy']);
    Route::post('api/calcularDescuento/{formulario}',   [FormularioController::class, 'calcularDescuento']);
    Route::resource('descuentos',  DescuentoController::class);

    Route::get('/log', function () {
        return Activity::all();
    });
    
    Route::get('logs/',             [ActivityController::class, 'index'])->name('logs.index');
    Route::get('logs/delete_all',   [ActivityController::class, 'delete_all'])->name('logs.delete.all');

    Route::post('operativos/update-coordenadas', [OperativoController::class, 'updateCoordenadas'])->name('operativos.updateCoordenadas');

    //Rutas de Actividades
    Route::get('/actividades/buscar', [ActividadController::class, 'buscarActividades'])->name('actividades.buscar');
    Route::get('/actividades/pdf', [ActividadController::class, 'generarPDF'])->name('actividades.pdf');
    Route::resource('actividades', ActividadController::class);

    //Rutas de Origenes
    Route::post('api/origenDelete/{origen}',   [OrigenController::class, 'destroy']);
    Route::resource('origens', OrigenController::class);

    //Rutas de Payments
    Route::post('payments/{payment}/view',   [PaymentController::class, 'viewPayment']);
    Route::post('payments/{payment}/confirm',   [PaymentController::class, 'confirmPayment']);
    Route::resource('payments', PaymentController::class);

});


Route::get('/messenger', fn() => view('messenger'));
Route::ResourceView('template');

Route::get('/facebook-verificacion', [FacebookController::class, 'verificacion']);