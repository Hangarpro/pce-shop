<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DireccionesController;

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

Route::get('/about', function () {
    return view('about/index');
});


Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/productos/details', function () {
    return view('productos/details');
});

Route::get('/login', function () {
    return view('login/index');
});

Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/register', function () {
    return view('registro/index');
});

Route::post('/register', [UsuarioController::class, 'store']);

Route::get('/profile', function () {
    return view('profile/index');
});

Route::post('profile/edit', [UsuarioController::class, 'updateContrasena']);

Route::get('/profile/edit', function () {
    return view('profile/editUser');
});

Route::post('profile/edit', [UsuarioController::class, 'updateUsuario']);

Route::get('/profile/address', function () {
    return view('profile/addEditAddress');
});

Route::post('/profile/address', [DireccionesController::class, 'store']);

Route::put('/profile/address/{id}', [DireccionesController::class, 'update']);

Route::delete('/profile/address/{id}', [DireccionesController::class, 'destroy']);

Route::get('/profile/order', function () {
    return view('profile/detailsOrder');
});

Route::get('/cart', function () {
    return view('cart/index');
});

Route::get('/payment', function () {
    return view('cart/payment');
});

Route::get('/paid', function () {
    return view('cart/finish');
});
