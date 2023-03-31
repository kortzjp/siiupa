<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\AsistenciasController;
use App\Models\ServiciosWeb;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    $serviciosWeb = Serviciosweb::where('perfil', 'PÚBLICO')->where('estatus', '1')->get();
    foreach ($serviciosWeb as $key => $value) {
        $serviciosWeb[$key]['url'] = substr($value['url'], 0, -4);
    }
    return view('welcome', ['serviciosWeb' => $serviciosWeb]);
});

Route::prefix('alumnos')->name('alumnos.')->group(function() {
    Route::view('/login', 'alumnos.login')->name('login');
    Route::post('/check', [AlumnosController::class, 'check'])->name('check');
    Route::get('/exit', [AlumnosController::class, 'exit'])->name('exit');
    
    Route::group(['middleware' => ['AuthAlumnos']], function() {
        Route::get('/index', [AlumnosController::class, 'index'])->name('index');
    });
});

Route::prefix('maestros')->name('maestros.')->group(function() {
    Route::view('/login', 'maestros.login')->name('login');
    Route::post('/check', [MaestrosController::class, 'check'])->name('check');
    Route::get('/salir_m', [MaestrosController::class, 'exit'])->name('exit');
    
    Route::group(['middleware' => ['AuthMaestros']], function() {
        Route::get('/index', [MaestrosController::class, 'index'])->name('index');
        Route::get('/captura_cal_tmp', [MaestrosController::class, 'listasAsistencia'])->name('listasAsistencia');
        Route::get('/capturar_asistencias', [AsistenciasController::class, 'capturarAsistencias'])->name('capturarAsistencias');
    });
});


