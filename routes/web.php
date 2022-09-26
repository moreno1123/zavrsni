<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/update_user', [UserController::class, 'update_user'])->name('update_user');

Route::post('/update_category', [UserController::class, 'update_category'])->name('update_category');
Route::post('/create_category', [UserController::class, 'create_category'])->name('create_category');
Route::post('/delete_category', [UserController::class, 'delete_category'])->name('delete_category');

require __DIR__ . '/auth.php';
