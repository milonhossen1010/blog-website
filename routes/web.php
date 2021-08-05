<?php

use App\Http\Controllers\AuthManageController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend 
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/blog', [FrontendController::class, 'post'])->name('frontend.post'); 
Route::get('/blog/{slug}', [FrontendController::class, 'singlePost'])->name('frontend.post.single'); 
Route::get('/search/{id}', [FrontendController::class, 'postSearch'])->name('frontend.post.search'); 
Route::get('/search/user/{id}', [FrontendController::class, 'userSearch'])->name('frontend.post.user.search'); 
Route::get('/404', [FrontendController::class, 'notFound'])->name('frontend.notfound'); 
 
//AuthManage
Route::get('auth-manage', [AuthManageController::class, 'check']);

//Comments 
Route::post('post-comment-index', [CommentController::class, 'index'])->name('comment.index');
Route::post('post-comment-store', [CommentController::class, 'store'])->name('comment.store');
Route::post('post-comment-reply-store', [CommentController::class, 'reply'])->name('comment.reply');

// Admin panel route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    //Dashboard load
    Route::get('dashboard', function(){
        return view('admin.index');
    })->name('dashboard');

    //Category controller
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/show-all', [CategoryController::class, 'showAll'])->name('category.showall');
    Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    //Tag Controller
    Route::resource('tag', TagController::class);
    Route::get('show-all-tag', [TagController::class, 'showAll'])->name('tag.showall');
    Route::get('delete-tag/{id}', [TagController::class, 'deleteTag'])->name('tag.delete-tag');
    Route::post('update-tag', [TagController::class, 'updateTag'])->name('tag.update-tag');
    //Post Controller
    Route::resource('post', PostController::class);
    Route::post('post/showall', [PostController::class, 'showall'])->name('post.showall');
    Route::get('post/status/{post}', [PostController::class, 'status'])->name('post.status');

    //User
    Route::resource('user', UserController::class);

});