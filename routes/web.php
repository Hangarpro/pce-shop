<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\ContactanosController;

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

//Inicio
Route::get('/', [ProductoController::class, 'welcome'])->name('welcome');
Route::get('/about', [ProductoController::class, 'about'])->name('about');

//Contacto
Route::get('/contact', [ContactanosController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactanosController::class, 'store'])->name('contact.store');

//Productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

//Registro
Route::get('/register', [LoginController::class, 'register'])->name('register.index');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');

//Profile
Route::get('/profile', [UsuarioController::class, 'profile'])->name('profile.index');
Route::post('profile/edit1', [UsuarioController::class, 'updateContrasena'])->name('profile.password');
Route::get('/profile/edit', [UsuarioController::class, 'editProfile'])->name('profile.show');
Route::post('profile/edit', [UsuarioController::class, 'updateUsuario'])->name('profile.update');
Route::get('/profile/address', [UsuarioController::class, 'profileAddress'])->name('profile.address');

//Direcciones
Route::post('/profile/address', [DireccionesController::class, 'store'])->name('address.store');
Route::get('/profile/address/edit/{id}', [DireccionesController::class, 'showDireccion'])->name('address.show');
Route::put('/profile/address/edit/{id}', [DireccionesController::class, 'update'])->name('address.update');
Route::delete('/profile/address/destroy/{id}', [DireccionesController::class, 'destroy'])->name('address.destroy');

/*
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

Route::get('/productsAdd', function () {
    return view('admin/products/addEdit');
});

Route::get('/productsUpdate', function () {
    return view('admin/products/update');
});
*/