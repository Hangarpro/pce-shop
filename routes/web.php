<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/login', function () {
    return view('login/index');
});

Route::get('/register', function () {
    return view('registro/index');
});

Route::post('/register', 'UsuarioController@store');

Route::get('/profile', function () {
    return view('profile/index');
});

Route::get('/profile/edit', function () {
    return view('profile/editUser');
});

Route::get('/profile/address', function () {
    return view('profile/addEditAddress');
});
