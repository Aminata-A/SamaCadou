<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CategoryController;

Route::resource('ideas', IdeaController::class);
Route::resource('categories', CategoryController::class);
