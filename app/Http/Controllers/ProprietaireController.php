<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{





    public function index()
    {
        $proprietaires = Proprietaire::all();

        return view('proprietaires.index', compact('proprietaires'));
    }



    public function create()
    {
        return view('proprietaires.create');
    }



    public function store(Request $request)
    {
        $input = $request->all();
        Proprietaire::create($input);
        return redirect('/proprietaires')->with('success', 'Cities created successfully');
    }






    public function edit($id)
    {
        $proprietaires = Proprietaire::find($id);
        return view('proprietaires.edit', compact('proprietaires'));
    }






    public function update(Request $request, $id)
    {
        $proprietaires = Proprietaire::find($id);
        $input = $request->all();
        $proprietaires->update($input);
        return redirect('/proprietaires')->with('success', 'Cities updated successfully');
    }






    public function destroy($id)
    {
        Proprietaire::destroy($id);
        return redirect('/')->with('success', 'Cities deleted successfully');
    }
}
