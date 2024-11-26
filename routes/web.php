<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NotificationController;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Ruta para el registro
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post');

// Ruta para el inicio de sesión
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirige a la página de inicio u otra página después de cerrar sesión
})->name('logout');

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth'])->name('products.index');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

Route::get('/product/{id}', function($id) {
    $product = Product::findOrFail($id);  // Buscar el producto por su ID
    return view('products.show', compact('product'));  // Pasar el producto a la vista
})->name('product.show');

// Favoritos
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/{product}', [FavoriteController::class, 'store'])->name('favorites.store');

Route::get('/checkout/{product}', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/{product}/process', [CheckoutController::class, 'confirmPurchase'])->name('checkout.process');
Route::post('/checkout/{product}/confirm', [CheckoutController::class, 'confirmPurchase'])->name('checkout.confirm');
Route::post('/checkout/{product}/complete', [CheckoutController::class, 'completePurchase'])->name('checkout.complete');


Route::post('/notifications/read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['status' => 'success']);
})->name('notifications.read');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
