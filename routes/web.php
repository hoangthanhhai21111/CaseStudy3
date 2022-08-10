<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\Flight_routeController;
use App\Http\Controllers\flight_schedulesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->group(function () {
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/add', [LoginController::class, 'add'])->name('add');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/loginProcessing', [LoginController::class, 'loginProcessing'])->name('loginProcessing');
});
Route::prefix('/')->middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index')->middleware(['auth', 'PreventBackHistory']);
    Route::prefix('/')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::resource('user', UserController::class);
    });
    Route::prefix('plane')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [PlaneController::class, 'index'])->name('plane.index');
        Route::get('create', [PlaneController::class, 'create'])->name('plane.create');
        Route::post('store', [PlaneController::class, 'store'])->name('plane.store');
        Route::get('{id}/show', [PlaneController::class, 'show'])->name('plane.show');
        Route::get('{id}/edit', [PlaneController::class, 'edit'])->name('plane.edit');
        Route::put('{id}/update', [PlaneController::class, 'update'])->name('plane.update');
        Route::delete('{id}/delete', [PlaneController::class, 'destroy'])->name('plane.delete');
    });
    Route::prefix('route')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [Flight_routeController::class, 'index'])->name('route.index');
        Route::get('create', [Flight_routeController::class, 'create'])->name('route.create');
        Route::post('store', [Flight_routeController::class, 'store'])->name('route.store');
        Route::get('{id}/show', [Flight_routeController::class, 'show'])->name('route.show');
        Route::get('{id}/edit', [Flight_routeController::class, 'edit'])->name('route.edit');
        Route::put('{id}/update', [Flight_routeController::class, 'update'])->name('route.update');
        Route::delete('{id}/delete', [Flight_routeController::class, 'destroy'])->name('route.delete');
    });
    Route::prefix('schedules')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [flight_schedulesController::class, 'index'])->name('schedules.index');
        Route::get('create', [flight_schedulesController::class, 'create'])->name('schedules.create');
        Route::post('store', [flight_schedulesController::class, 'store'])->name('schedules.store');
        Route::get('{id}/show', [flight_schedulesController::class, 'show'])->name('schedules.show');
        Route::get('{id}/edit', [flight_schedulesController::class, 'edit'])->name('schedules.edit');
        Route::put('{id}/update', [flight_schedulesController::class, 'update'])->name('schedules.update');
        Route::delete('{id}/delete', [flight_schedulesController::class, 'destroy'])->name('schedules.delete');
    });
    Route::prefix('Responsible')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [ResponsibleController::class, 'index'])->name('Responsible.index');
        Route::get('create', [ResponsibleController::class, 'create'])->name('Responsible.create');
        Route::post('store', [ResponsibleController::class, 'store'])->name('Responsible.store');
        Route::get('{id}/show', [ResponsibleController::class, 'show'])->name('Responsible.show');
        Route::get('{id}/edit', [ResponsibleController::class, 'edit'])->name('Responsible.edit');
        Route::put('{id}/update', [ResponsibleController::class, 'update'])->name('Responsible.update');
        Route::delete('{id}/delete', [ResponsibleController::class, 'destroy'])->name('Responsible.delete');
    });
    Route::prefix('customers')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [CustomersController::class, 'index'])->name('customers.index');
        Route::get('create', [customersController::class, 'create'])->name('customers.create');
        Route::post('store', [customersController::class, 'store'])->name('customers.store');
        Route::get('{id}/show', [customersController::class, 'show'])->name('customers.show');
        Route::get('{id}/edit', [customersController::class, 'edit'])->name('customers.edit');
        Route::put('{id}/update', [customersController::class, 'update'])->name('customers.update');
        Route::delete('{id}/delete', [customersController::class, 'destroy'])->name('customers.delete');
    });
    Route::prefix('price')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [PriceController::class, 'index'])->name('price.index');
        Route::get('create', [PriceController::class, 'create'])->name('price.create');
        Route::post('store', [PriceController::class, 'store'])->name('price.store');
        Route::get('{id}/show', [PriceController::class, 'show'])->name('price.show');
        Route::get('{id}/edit', [PriceController::class, 'edit'])->name('price.edit');
        Route::put('{id}/update', [PriceController::class, 'update'])->name('price.update');
        Route::delete('{id}/delete', [PriceController::class, 'destroy'])->name('price.delete');
    });
    Route::prefix('position')->middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::get('/', [PositionController::class, 'index'])->name('Position.index');
        Route::get('create', [PositionController::class, 'create'])->name('Position.create');
        Route::post('store', [PositionController::class, 'store'])->name('Position.store');
        Route::get('{id}/show', [PositionController::class, 'show'])->name('Position.show');
        Route::get('{id}/edit', [PositionController::class, 'edit'])->name('Position.edit');
        Route::put('{id}/update', [PositionController::class, 'update'])->name('Position.update');
        Route::delete('{id}/delete', [PositionController::class, 'destroy'])->name('Position.delete');
    });
});
Route::prefix('/')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/', [OderController::class, 'check'])->name('home.index');
        Route::get('result', [OderController::class, 'result'])->name('home.result');
        Route::get('oder/{id}', [OderController::class, 'oder'])->name('home.oder');
        Route::get('orderProcessing/{id}', [OderController::class, 'orderProcessing'])->name('home.orderProcessing');
        Route::get('notification/{id}', [OderController::class, 'notification'])->name('home.notification');     
        // Route::get('/{id}', [OderController::class, 'orders'])->name('home.orders');     
    });
});
