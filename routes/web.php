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

use App\Http\Controllers\UserController;

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/create', [UserController::class, 'create']);

// Route::get('/create/users' , [UserController::class , 'createUser'])->name('users.create');
// Route::post('/create/users' , [UserController::class , 'store'])->name('users.store');

Route::get('/users/{id}/edit' , [UserController::class , 'edit'])->name('users.edit');

Route::put('/users/{id}' , [UserController::class , 'update'])->name('users.update');

Route::delete('/users/{id}' , [UserController::class , 'destroy'])->name('users.destroy');

Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');  

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RepairJobController;
use App\Http\Controllers\ReportController;

Route::middleware(['auth', 'PreventBack'])->group(function () {
    
    Route::resource('devices', DeviceController::class);
    
    Route::get('repair/create', [RepairJobController::class, 'create'])->name('repair.create');
    Route::post('repair/store', [RepairJobController::class, 'store'])->name('repair.store');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/search', [ReportController::class, 'search'])->name('report.search');

    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});