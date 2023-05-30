<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CarritoController;

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
Route::post('/productos', [CarritoController::class, 'anadir'])->name('productos.store');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
Route::post('/profile/address/edit/{id}', [DireccionesController::class, 'edit'])->name('address.update');
Route::delete('/profile/address/destroy/{id}', [DireccionesController::class, 'destroy'])->name('address.destroy');

//Carrito
Route::get('/cart', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/cart', [CarritoController::class, 'enviar'])->name('carrito.send');
Route::get('/payment', [CarritoController::class, 'show'])->name('carrito.show');
Route::post('/payment', [CarritoController::class, 'comprar'])->name('carrito.store');
Route::get('/paid', [CarritoController::class, 'pagado'])->name('carrito.done');
Route::get('/profile/order/{id}', [CarritoController::class, 'profileOrder'])->name('order.show');

//Dashboard
Route::get('/dashboard', [AdministradorController::class, 'index'])->name('admin.statistics.index');

//Dashboard productos
Route::get('/products', [AdministradorController::class, 'productos'])->name('admin.products.index');
Route::get('/productsAdd', [AdministradorController::class, 'add_producto'])->name('admin.products.new');
Route::post('/productsAdd', [AdministradorController::class, 'store_producto'])->name('admin.products.add');
Route::get('/productsUpdate/{id}', [AdministradorController::class, 'show_producto'])->name('admin.products.show');
Route::post('/productsUpdate/{id}', [AdministradorController::class, 'update_producto'])->name('admin.products.update');
Route::delete('/productsDestroy/{id}', [AdministradorController::class, 'destroy_producto'])->name('admin.products.destroy');
Route::get('/productsUpdateExistencia', [AdministradorController::class, 'show_existencia'])->name('admin.products.existencia');
Route::post('/productsUpdateExistencias', [AdministradorController::class, 'update_existencia'])->name('admin.products.addExistencia');

//Dashboard usuarios
Route::get('/users', [AdministradorController::class, 'usuarios'])->name('admin.users.index');
Route::get('/usersAdd', [AdministradorController::class, 'add_usuario'])->name('admin.users.new');
Route::post('/usersAdd', [AdministradorController::class, 'store_usuario'])->name('admin.users.add');
Route::get('/usersUpdate/{id}', [AdministradorController::class, 'show_usuario'])->name('admin.users.show');
Route::post('/usersUpdate/{id}', [AdministradorController::class, 'update_usuario'])->name('admin.users.update');
Route::get('/usersPass/{id}', [AdministradorController::class, 'show_update'])->name('admin.users.password');
Route::post('/usersPass/{id}', [AdministradorController::class, 'update_contrasena'])->name('admin.users.passwordUpdate');
Route::delete('/usersDestroy/{id}', [AdministradorController::class, 'destroy_usuario'])->name('admin.users.destroy');
Route::get('/sales', [AdministradorController::class, 'ventas'])->name('admin.sales.index');