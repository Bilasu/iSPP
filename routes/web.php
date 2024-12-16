<?php

use App\Http\Controllers\AdminController;
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
Route::get('admin/checkDatabaseConnection', [AdminController::class, 'checkDatabaseConnection']);
Route::get('admin/login', [AdminController::class, 'index'])->name('admin.login');
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/form', [AdminController::class, 'form'])->name('admin.form');
Route::get('admin/table', [AdminController::class, 'table'])->name('admin.table');
