<?php
// Rota personalizada para admin, !!configurar em RouteServiceProvider!!
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;


Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//função para as rotas protegidas em UserController!!!!
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

//metodo except tem que ser usado caso uma função seja exluida da controller
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

//metodo except tem que ser usado caso uma função seja exluida da controller
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

//metodo except tem que ser usado caso uma função seja exluida da controller
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
