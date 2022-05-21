<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editor = Editor::select('editors.id')
            ->join('users', 'users.id', '=', 'editors.users_id')
            ->where('users.id', Auth::user()->id)
            ->first();
        return view('categories.create', compact('editor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:45',
            'overview' => 'required|max:255',
            'editors_id' => 'required',

        ]);

        $categorie = Categorie::create($request->all());

        if ($categorie) {
            return redirect()->route('categories.index')->withSuccess('catégorie créer avec succès');
        }
        redirect()->back()->withInput()->withError('erreur à la création de la categorie ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($categorie)
    {
        $editor = Editor::select('editors.id')
            ->join('users', 'users.id', '=', 'editors.users_id')
            ->where('users.id', Auth::user()->id)
            ->first();
        $categorie = Categorie::findOrFail($categorie);

        return view('categories.edit', compact('categorie','editor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorie)
    {
        $request->validate([
            'name' => 'required|max:45',
            'overview' => 'required|max:255',
        ]);

        $categorie = Categorie::findOrFail($categorie);
        
        $categorie->update($request->all());

        if ($categorie) {
            return redirect()->route('categories.index')->withSuccess('catégorie modifiée avec succès');
        }
        redirect()->back()->withInput()->withError('erreur à la modification de la categorie ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorie)
    {
        $categorie = Categorie::findOrFail($categorie);
        $categorie->delete();
        return redirect()->route('categories.index')->with('alert', 'la catégorie a été supprimée');
    }
}
