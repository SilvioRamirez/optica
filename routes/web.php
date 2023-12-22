<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BioanalistaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\LenteController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\OperativoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TratamientoController;
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

Route::get('/', function () {
    return view('landing.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-municipios', [DropdownController::class, 'fetchMunicipio']);
Route::post('api/fetch-parroquias', [DropdownController::class, 'fetchParroquia']);


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

    //Rutas de Productos
    Route::get('/products/{product}/delete',    [ProductController::class, 'delete'])->name('products.delete');
    Route::resource('products',                 ProductController::class);

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
    Route::get('/operativos/{operativo}/delete',    [OperativoController::class, 'delete'])->name('operativos.delete');
    Route::resource('operativos',                   OperativoController::class);

    //Rutas de Tratamientos
    Route::get('/tratamientos/{tratamiento}/delete',    [TratamientoController::class, 'delete'])->name('tratamientos.delete');
    Route::resource('tratamientos',  TratamientoController::class);

    //Rutas de Bioanalistas
    Route::get('/bioanalistas/{bioanalista}/delete',    [BioanalistaController::class, 'delete'])->name('bioanalistas.delete');
    Route::resource('bioanalistas',                     BioanalistaController::class);

    //Rutas de Muestras
    Route::get('/muestras/{muestra}/delete',    [MuestraController::class, 'delete'])->name('muestras.delete');
    Route::resource('muestras',                 MuestraController::class);

    //Rutas de Examenes y sus Caracteristicas
    Route::get('/examenes/{examen}/delete',                 [ExamenController::class, 'delete'])->name('examenes.delete');
    Route::get('/examenes/{examen}/caracteristicas',        [ExamenController::class, 'caracteristicas_index'])->name('examenes.caracteristicas');
    Route::post('/examenes/caracteristicas/store',          [ExamenController::class, 'caracteristicas_store'])->name('examenes.caracteristicas.store');
    Route::get('/examenes/caracteristicas/destroy/{id}',    [ExamenController::class, 'caracteristicas_destroy'])->name('examenes.caracteristicas.destroy');
    Route::get('/examenes/caracteristicas/edit/{id}',       [ExamenController::class, 'caracteristicas_edit'])->name('examenes.caracteristicas.edit');
    Route::patch('/examenes/caracteristicas/update/{id}',   [ExamenController::class, 'caracteristicas_update'])->name('examenes.caracteristicas.update');
    Route::resource('examenes',                             ExamenController::class);

    Route::get('/log', function () {
        return Activity::all();
    });
    
    Route::get('logs/',             [ActivityController::class, 'index'])->name('logs.index');
    Route::get('logs/delete_all',   [ActivityController::class, 'delete_all'])->name('logs.delete.all');

});

