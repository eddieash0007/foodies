<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;

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






Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Post Routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');

    // End Post Routes
    

    // Category Routes
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/trashed', [CategoriesController::class, 'trashed'])->name('categories.trashed');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');

    // End Category Routes


    // Tag Routes
    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::get('/tags/trashed', [TagsController::class, 'trashed'])->name('tags.trashed');

    // End Tag Routes
});

require __DIR__.'/auth.php';
