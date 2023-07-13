@extends('layouts.app')

@section('title', 'Add Batiment')

@section('content')
    <div class="container mt-5">
        <h1>Add batiments</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('batiments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Batiment Name" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Batiment Adresse"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="id_proprietaire">Proprietaire :</label>
                <select name="id_proprietaire" class="form-control mb-3">
                    <option value="-1">select Proprietaire</option>
                    @foreach ($proprietaires as $proprietaire)
                        <option value="{{ $proprietaire->id }}">{{ $proprietaire->nom }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="entree_principale">Entree_principale</label>
                <input type="text" class="form-control" id="entree_principale" name="entree_principale"
                    placeholder="Batiment entree_principale">
            </div>
            <div class="form-group">
                <label for="entree_secondaire">Entree_secondaire</label>
                <input type="text" class="form-control" id="entree_secondaire" name="entree_secondaire"
                    placeholder="Batiment entree_secondaire">
            </div>
            <div class="form-group">
                <label for="nbApptDispo">nbApptDispo</label>
                <input type="number" class="form-control" id="nbApptDispo" name="nbApptDispo"
                    placeholder="Batiment nbApptDispo">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Batiment</button>
        </form>
    </div>
@endsection
