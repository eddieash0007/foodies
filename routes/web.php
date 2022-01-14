<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SettingsController;

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


Route::get('/', [FrontEndController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontEndController::class, 'about'])->name('frontend.about');
Route::get('/post/{slug}', [FrontEndController::class, 'postSingle'])->name('frontend.post.single');






// Route::get('/test', function () {
//     return App\Models\Tag::find(1)->posts;
// });






Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){

    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // End Dashboard Routes

    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // End Settings Routes


    // Post Routes
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
    Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');
    Route::get('/posts/trashed', [PostsController::class, 'trashed'])->name('posts.trashed');
    Route::get('/post/create', [PostsController::class, 'create'])->name('posts.create');
    Route::get('/post/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::get('/post/trash/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/kill/{id}', [PostsController::class, 'kill'])->name('post.kill');
    Route::get('/post/restore/{id}', [PostsController::class, 'restore'])->name('post.restore');

    // End Post Routes
    

    // Category Routes
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/trashed', [CategoriesController::class, 'trashed'])->name('categories.trashed');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
    Route::post('/category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
    Route::get('/category/trash/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/kill/{id}', [CategoriesController::class, 'kill'])->name('category.kill');
    Route::get('/category/restore/{id}', [CategoriesController::class, 'restore'])->name('category.restore');

    // End Category Routes


    // Tag Routes
    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::post('/tag/store', [TagsController::class, 'store'])->name('tag.store');
    Route::post('/tag/update/{id}', [TagsController::class, 'update'])->name('tag.update');
    Route::get('/tags/destroy/{id}', [TagsController::class, 'destroy'])->name('tag.destroy');

    // End Tag Routes
});

require __DIR__.'/auth.php';
