<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $ideas = Idea::all();
        $categories = Category::all();
        
        return view('ideas.index', compact('ideas', 'categories'));    
    }
    
    public function ideas(Request $request){
        $categories = Category::all();
        $ideasQuery = Idea::query();
    
        if ($request->has('category_id')) {
            $ideasQuery->where('category_id', $request->category_id);
        }
    
        if ($request->has('status')) {
            $ideasQuery->where('status', $request->status);
        }
    
        $ideas = $ideasQuery->get();
    
        return view('ideas.ideas', compact('ideas', 'categories'));
    }
    
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $categories = Category::all();
        return view('ideas.create', compact('categories'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(IdeaRequest $request, Idea $idea)
    {
        $idea->create($request->validated());
        return redirect()->route('ideas.index')
        ->with('success', 'Idée créée avec succès.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Idea $idea)
    {
        $categories = Category::all();
        return view('ideas.edit', compact('idea', 'categories'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Idea $idea)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Valider la requête
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);
        
        // Mettre à jour le statut de l'idée
        $idea->status = $request->status;
        $idea->save();
        
        return redirect()->route('ideas.index')->with('success', 'Statut de l\'idée mis à jour avec succès.');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Idea $idea)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
        
        $idea->delete();
        
        return redirect()->back()->with('success', 'Idée supprimée avec succès.');
    }
}
