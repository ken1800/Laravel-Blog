<?php

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

use App\Http\Controllers\Blog\PostsController;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}',[PostsController::class,'show'])->name('blog.show');
Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('blog.category');
Route::get('blog/tags/{tag}',[PostsController::class,'tag'])->name('blog.tag');

Auth::routes();


Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories','CategoriesController');
    Route::resource('tags','TagsController');
    Route::get('posts/{post}/delete', 'PostsController@delete');

    Route::resource('posts','PostsController')->middleware(['verifyCategoryCount']);
    Route::get('trashed_post','PostsController@trashed_post')->name('trashed-post.index');
    Route::put('restore_post/{post}','PostsController@restore_post')->name('restore-post');
});

Route::middleware(['auth','admin'])->group(function (){

Route::get('users', 'UsersController@index')->name('users.index');
Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
