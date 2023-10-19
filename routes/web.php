<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrinterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::prefix('auth')->group(function (){
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
//     Route::get('/register', [AuthController::class,'register'])->name('register');
//     Route::post('/register', [AuthController::class,'registerAction'])->name('register.action');
//     Route::get('logout', 'logout')->middleware('auth')->name('logout');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/category', 'index')->name('categories.index');
    Route::get('/category/create', 'create')->name('categories.create');
    Route::post('/category', 'store')->name('categories.store');
    Route::get('edit/{category}', 'edit')->name('categories.edit');
    Route::put('update/{category}', 'update')->name('categories.update');
    Route::delete('destroy/{category}', 'destroy')->name('categories.destroy');
});

Route::controller(PrinterController::class)->group(function(){
    Route::get('/printer','index')->name('printer.index');
    Route::get('/printer/create','create')->name('printer.create');
    Route::post('/printer','store')->name('printer.store');
    Route::get('/printer/{printers}','edit')->name('printer.edit');
    Route::put('update/{printers}', 'update')->name('printer.update');
    Route::get('destroy/{printers}', 'destroy')->name('printer.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
});
