<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

/* --------------------------------------  AdminController ----------------------------------------------  */

/* ------------------  Products  ------------------ */
Route::get('/products/create', [AdminController::class, 'products'])->name('products.create');
Route::post('/store', [AdminController::class, 'store_products'])->name('products.store');
Route::get('/products', [AdminController::class, 'list_products'])->name('products.index');
Route::get('/products/edit/{id}', [AdminController::class, 'products_edit'])->name('products.edit');
Route::patch('/products/save/{id}', [AdminController::class, 'products_save'])->name('products.save');
Route::delete('/products/delete/{id}', [AdminController::class, 'products_delete'])->name('products.delete');
Route::get('/productdetails/{id}', [AdminController::class, 'products_details'])->name('product_details');

/* ------------------  Categories  ------------------ */
Route::get('/categories/create', [AdminController::class, 'categories'])->name('categories.create');
Route::post('/categories/store', [AdminController::class, 'store_categories'])->name('categories.store');
Route::get('/categories', [AdminController::class, 'list_categories'])->name('categories.index');
Route::get('/categories/edit/{id}', [AdminController::class, 'categories_edit'])->name('categories.edit');
Route::patch('/categories/save/{id}', [AdminController::class, 'categories_save'])->name('categories.save');
Route::delete('/categories/delete/{id}', [AdminController::class, 'categories_delete'])->name('categories.delete');

/* ------------------  Users  ------------------ */
Route::get('/users/create', [AdminController::class, 'users'])->name('users.create');
Route::post('/users/store', [AdminController::class, 'store_users'])->name('users.store');
Route::get('/users', [AdminController::class, 'list_users'])->name('users.index');
Route::get('/users/edit/{id}', [AdminController::class, 'users_edit'])->name('users.edit');
Route::patch('/users/save/{id}', [AdminController::class, 'users_save'])->name('users.save');
Route::delete('/users/delete/{id}', [AdminController::class, 'users_delete'])->name('users.delete');

/* ---------------- Cart ---------------------------- */
Route::get('cart', [AdminController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [AdminController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [AdminController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [AdminController::class, 'remove'])->name('remove.from.cart');
/* -------------------------------------- End of AdminController ----------------------------------------------  */

/* ------------------  Home  ------------------ */
Route::get('/', [AdminController::class, 'index'])->name('welcome');

/* ------------------  Dashboard  ------------------ */
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
