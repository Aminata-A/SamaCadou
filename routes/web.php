<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
Route::resource('ideas', IdeaController::class);
Route::resource('comments', CommentController::class)->except('destroy');
Route::resource('categories', CategoryController::class);
Route::middleware('auth')->delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');



// Route pour afficher toutes les idées avec les filtres
Route::get('/all/idea', [IdeaController::class, 'ideas'])->name('all.ideas');

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