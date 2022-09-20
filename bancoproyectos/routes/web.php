<?php

use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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
    return redirect('/proyectos/');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/proyectos/');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/proyectos/');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/proyectos/reporte', [ProyectoController::class, 'reporte'])->name('proyectos.reporte');

Route::middleware(['auth:sanctum', 'verified'])->resource('/proyectos', ProyectoController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/proyectos/{estado}/listado', [ProyectoController::class, 'listado'])->name('proyectos.listado');



Route::resource('users', UserController::class)->only(['index','edit','update','create','store'])->names('admin.users');

Route::resource('roles', RoleController::class)->only(['index','edit','update','create','store','destroy'])->names('admin.roles');

