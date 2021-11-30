<?php
// Rota personalizada para admin, !!configurar em RouteServiceProvider!!
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;



Route::get('', [HomeController::class, 'index']);