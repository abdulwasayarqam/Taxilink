<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// User Routes

Route::get('/user-list', [App\Http\Controllers\UserController::class, 'index'])->name('user-list');
Route::post('/user-store', [App\Http\Controllers\UserController::class, 'store'])->name('user-store');
Route::get('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user-delete');
Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');


Route::get('/employee-list', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee-list');
Route::post('/employee-store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee-store');
Route::get('/employee-delete/{id}', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee-delete');
Route::post('/employee-update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee-update');

Route::get('/association-list', [App\Http\Controllers\AssociationController::class, 'index'])->name('association-list');
Route::post('/association-store', [App\Http\Controllers\AssociationController::class, 'store'])->name('association-store');
Route::get('/association-delete/{id}', [App\Http\Controllers\AssociationController::class, 'delete'])->name('association-delete');
Route::post('/association-update/{id}', [App\Http\Controllers\AssociationController::class, 'update'])->name('association-update');


Route::get('/vehicles-list', [App\Http\Controllers\VehiclesController::class, 'index'])->name('vehicles-list');
Route::post('/vehicles-store', [App\Http\Controllers\VehiclesController::class, 'store'])->name('vehicles-store');
Route::get('/vehicles-delete/{id}', [App\Http\Controllers\VehiclesController::class, 'delete'])->name('vehicles-delete');
Route::post('/vehicles-update/{id}', [App\Http\Controllers\VehiclesController::class, 'update'])->name('vehicles-update');

Route::get('/routes-modules-list', [App\Http\Controllers\RoutesModulesController::class, 'index'])->name('routes-modules-list');
Route::post('/routes-modules-store', [App\Http\Controllers\RoutesModulesController::class, 'store'])->name('routes-modules-store');
Route::get('/routes-modules-delete/{id}', [App\Http\Controllers\RoutesModulesController::class, 'delete'])->name('routes-modules-delete');
Route::post('/routes-modules-update/{id}', [App\Http\Controllers\RoutesModulesController::class, 'update'])->name('routes-modules-update');
