<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.page')->middleware(['check']);

Route::get('login', [AuthController::class, 'index'])->name('login.page');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register.page');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/agent', [AgentController::class, 'index'])->name('agent.index')->middleware(['check']);
Route::post('/agent', [AgentController::class, 'store'])->name('agent.store')->middleware(['check']);
Route::get('/agent/{id}/children', [AgentController::class, 'getChildren'])->name('agent.children')->middleware(['check']);

Route::get('/product', [ProductController::class, 'index'])->name('product.index')->middleware([('check')]);
Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware(['check']);
Route::get('/product/{id}/children', [ProductController::class, 'getChildren'])->name('product.children')->middleware(['check']);

