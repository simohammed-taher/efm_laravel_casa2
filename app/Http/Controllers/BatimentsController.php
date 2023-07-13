<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class BatimentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $batiments = Batiment::orderBy('id', 'DESC')->paginate(10);

    //     return view('batiments.index', compact('batiments'));
    // }


    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search) {
            $batiments = Batiment::where('nom', 'LIKE', "%{$search}%")->orderBy('id', 'DESC')->paginate(6);
        } else {
            $batiments = Batiment::orderBy('id', 'DESC')->paginate(6);
        }

        return view('batiments.index', compact('batiments'));
    }

    // public function filtrer (Request $request)
    // {
    //     $search = $request->query('search');
    //     if ($search) {
    //         $batiments = Batiment::where('nom', 'LIKE', "%{$search}%")->orderBy('id', 'DESC')->paginate(6);
    //     } else {
    //         $batiments = Batiment::orderBy('id', 'DESC')->paginate(6);
    //     }

    //     return view('batiments.index', compact('batiments'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proprietaires = Proprietaire::all();
        return view('batiments.create', compact('proprietaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
        $validatedData =  $request -> validate([
            'nom' => 'required|unique:batiments',
            'adresse' => 'required|max:150',
            'id_proprietaire' => 'required|exists:proprietaires,id',
            'entree_principale' => 'required',
            'entree_secondaire' => 'required',
            'nbApptDispo' => 'required|integer'
        ]);

        Batiment::create($validatedData);

        return redirect()->route('batiments.index')->with('success', 'Le bâtiment a ajouté avec succès.');
   }


    /**
     * Display the specified resource.
     */
    public function show(Batiment $batiment)
    {
        return view('batiments.show', compact('batiment'));

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Batiment $batiment)
    {
        $proprietaires = Proprietaire::all();
        return view('batiments.edit', ['batiment' => $batiment, 'proprietaires' => $proprietaires]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Batiment $batiment, Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nom' => '|unique:batiments,nom,',
    //         'adresse' => 'required|max:150',
    //         'id_propriire' => 'required',
    //         'entree_principale' => 'required',
    //         'entree_secondaire' => 'required',
    //         'nbApptDispo' => 'required',
    //     ]);
    //     $batiment->update($validatedData);

    //     return redirect()->route('batiments.index')->with('success', 'Le bâtiment a été mis à jour avec succès.');
    // }


    public function update(Request $request, $id)
    {

        
        $proprietaires = Batiment::find($id);
        $input = $request->all();
        $proprietaires->update($input);
        return redirect('batiments')->with('success', 'Cities updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batiment $batiment)
    {
        $batiment->delete();
        return redirect()->route('batiments.index')->with('success', 'Le bâtiment a été supprimé avec succès.');

    }





}
