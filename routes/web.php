<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
Route::resource('ideas', IdeaController::class);
Route::resource('categories', CategoryController::class);



// Route pour afficher le formulaire de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route pour gérer le login (POST)
Route::post('/login', [LoginController::class, 'login']);

// Route pour déconnecter l'utilisateur (POST)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Route pour afficher le formulaire d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Route pour gérer l'inscription (POST)
Route::post('/register', [RegisterController::class, 'register']);