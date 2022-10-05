<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ConferencistaController;
use App\Http\Controllers\InscripcionController;
use App\Models\Evento;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [EventoController::class, 'index1'])->name('welcome');
Route::get('inscripcion/{evento}', [InscripcionController::class, 'inscripcion'])->name('inscripcion');
Route::post('inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');
Route::get('registrar-asistencia/{token}', [InscripcionController::class, 'registrarAsistencia'])->name('registrarAsistencia');

Route::get('confirmacion-asistencia', function () {
    return view('confirmacion-asistencia');
})->name('confirmacionAsistencia');

Route::resource('conferencista', ConferencistaController::class);


Route::get('gestion', function () {
    $eventos = Evento::orderBy('dia', 'asc')->orderBy('tipoEvento', 'asc')->orderBy('tema', 'asc')->get();
    return view('gestion.index', compact('eventos'));
})->name('gestion.index');

Route::get('informes/asistencia', [InscripcionController::class, 'exportarAsistencia'])->name('exportarAsistencia');
Route::get('eventos/enlace-calificacion/{token}', [EventoController::class, 'enlaceCalificacion'])->name('enlaceCalificacion');
Route::get('eventos/calificar/{evento}', [EventoController::class, 'verCalificarEvento'])->name('verCalificarEvento');
Route::post('eventos/calificacion/', [EventoController::class, 'calificarEvento'])->name('calificarEvento');
Route::resource('evento', EventoController::class);

Route::get('inscripcion/qr/{token}', function() {
    return view('email.inscripcion');
})->name('inscripcion.token');

Route::get('/empresas', function () {
    return view('empresas');
})->name('empresas');
Route::get('/universidades', function () {
    return view('universidades');
})->name('universidades');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});