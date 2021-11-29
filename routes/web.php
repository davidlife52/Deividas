<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\BusinessController;
use \App\Http\Controllers\SessionsController;
use \App\Http\Controllers\RoutesController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\BusController;
use \App\Http\Controllers\TicketsController;
use App\Enums\UserType;

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

Route::get('', [RoutesController::class, 'index'])->name('home');

Route::get('routes/{route:id}', [RoutesController::class, 'show'])->middleware('basic');
Route::post('routes/{route:id}', [RoutesController::class, 'order'])->middleware('basic');

Route::get('business', [BusinessController::class, 'index'])->middleware('business');

Route::get('tickets', [TicketsController::class, 'index'])->middleware('basic');
Route::get('tickets/{id}', [TicketsController::class, 'show'])->middleware('basic');
Route::delete('tickets/{id}', [TicketsController::class, 'destroy'])->middleware('basic');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/route/create', [AdminController::class, 'create'])->middleware('admin');
Route::post('admin/route/create', [AdminController::class, 'store'])->middleware('admin');

Route::get('admin/routes', [AdminController::class, 'index'])->middleware('admin');
Route::get('admin/routes/{route:id}', [AdminController::class, 'edit'])->middleware('admin');
Route::patch('admin/routes/{route:id}', [AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/routes/{route:id}', [AdminController::class, 'destroy'])->middleware('admin');

Route::get('admin/bus/create', [BusController::class, 'create'])->middleware('admin');
Route::post('admin/bus/create', [BusController::class, 'store'])->middleware('admin');

Route::get('admin/buses', [BusController::class, 'index'])->middleware('admin');
Route::get('admin/buses/{bus:id}', [BusController::class, 'edit'])->middleware('admin');
Route::patch('admin/buses/{bus:id}', [BusController::class, 'update'])->middleware('admin');
Route::delete('admin/buses/{bus:id}', [BusController::class, 'destroy'])->middleware('admin');
