<?php

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

Auth::routes();

Route::middleware('admin')->group(function()
{
    Route::get("/admin", "App\http\controllers\AdminController@index")->name("admin.index");
    Route::post("/admin/add", "App\http\controllers\AdminController@add")->name("admin.add");
    Route::delete("/admin/delete/{id}", "App\http\controllers\AdminController@delete")->name("admin.delete");
    Route::get("/admin/edit/{id}", "App\http\controllers\AdminController@edit")->name("admin.edit");
    Route::post("/admin/store/{id}", "App\http\controllers\AdminController@store")->name("admin.store");
});

Route::get("/", "App\http\controllers\HomeController@index")->name("home.index");
Route::get("/{id}", "App\http\controllers\HomeController@show")->name("home.show");
Route::get("/mybooks", "App\http\controllers\BooksController@index")->name("home.mybooks");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
