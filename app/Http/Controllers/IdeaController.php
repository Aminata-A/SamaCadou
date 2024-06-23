<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('ideas.index', compact('categories'));
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
        $categories = Category::all();
        return view('ideas.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdeaRequest $request, Idea $idea)
    {
        $idea->update($request->validated());
        return redirect()->route('ideas.index')
            ->with('success', 'Idée créée avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
