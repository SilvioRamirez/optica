<?php

use App\Models\Resultados;
use App\Models\Bioanalista;
use App\Models\Examen;
use App\Models\Caracteristicas;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BioanalistaController;
use App\Http\Controllers\ExamenController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    
    //Rutas de Roles
    Route::get('/roles/{role}/delete', [RoleController::class, 'delete'])->name('roles.delete');
    Route::resource('roles', RoleController::class);

    //Rutas de Usuarios
    /* Route::get('/users', [UserController::class, 'index'])->name('users.index'); */
    Route::get('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/ajax/create', [UserController::class, 'ajax_create'])->name('users.ajax.create');
    Route::resource('users', UserController::class);

    //Rutas de Productos
    Route::get('/products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::resource('products', ProductController::class);

    //Rutas de Pacientes
    Route::get('/pacientes/{paciente}/delete', [PacienteController::class, 'delete'])->name('pacientes.delete');
    Route::resource('pacientes', PacienteController::class);

    //Rutas de Bioanalistas
    Route::get('/bioanalistas/{bioanalista}/delete', [BioanalistaController::class, 'delete'])->name('bioanalistas.delete');
    Route::resource('bioanalistas', BioanalistaController::class);

    //Rutas de Examenes
    Route::get('/examenes/{examen}/delete', [ExamenController::class, 'delete'])->name('examenes.delete');
    Route::get('/examenes/{examen}/caracteristicas', [ExamenController::class, 'caracteristicas_index'])->name('examenes.caracteristicas');
    Route::resource('examenes', ExamenController::class);

    
    

    route::get('/caracteristicas', function(){
        $caracteristicas = Caracteristicas::all();
        return view('welcome', compact('caracteristicas'));
    });

    route::get('/resultados', function(){
        $resultados = Resultados::all();
        return view('resultado', compact('resultados'));
    });

});