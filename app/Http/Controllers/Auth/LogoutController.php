<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion de l'utilisateur
    
        $request->session()->invalidate(); // Invalidation de la session
    
        $request->session()->regenerateToken(); // Régénération du jeton CSRF
    
        return redirect('/'); // Redirection vers la page d'accueil
    }
}
