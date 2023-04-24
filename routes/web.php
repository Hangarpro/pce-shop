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

Route::get('/contact', function () {
    return view('contact/index');
});

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/productos/{id}', [ProductoController::class, 'show']);

Route::get('/productos/details', [ProductoController::class, 'show']);

Route::get('/login', [UsuarioController::class, 'loginShow']);

Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/register', function () {
    return view('registro/index');
});

Route::post('/register', [UsuarioController::class, 'store']);

Route::get('/profile', [UsuarioController::class, 'profile']);

Route::post('profile/edit1', [UsuarioController::class, 'updateContrasena'])->name('editarPass');

Route::get('/profile/edit', [UsuarioController::class, 'editProfile']);

Route::post('profile/edit', [UsuarioController::class, 'updateUsuario'])->name('editarUser');

Route::get('/profile/address', [UsuarioController::class, 'profileAddress']);

Route::post('/profile/address', [DireccionesController::class, 'store']);

Route::get('/profile/address/edit/{id}', [DireccionesController::class, 'showDireccion']);

Route::put('/profile/address/edit/{id}', [DireccionesController::class, 'update']);

Route::delete('/profile/address/destroy/{id}', [DireccionesController::class, 'destroy']);

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

Route::get('/dashboard', function () {
    return view('admin/statistics/index');
});

Route::get('/users', function () {
    return view('admin/users/index');
});

Route::get('/usersAdd', function () {
    return view('admin/users/addEdit');
});

Route::get('/sales', function () {
    return view('admin/sales/index');
});

Route::get('/products', function () {
    return view('admin/products/index');
});