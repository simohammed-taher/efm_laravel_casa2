@extends('layouts.app')

@section('title', 'Edit Batiment')

@section('content')
    <div class="container mt-5">
        <h1>Edit Batiment</h1>
        <form action="{{ route('batiments.update', $batiment->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nom">Name</label>
                <input type="text" class="form-control" value="{{ $batiment->nom }}" id="nom" name="nom"
                    placeholder="Batiment Name" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" value="{{ $batiment->adresse }}" id="adresse" name="adresse"
                    placeholder="Batiment Adresse" required>
            </div>
            <div class="form-group">
                <label for="id_proprietaire">Proprietaire</label>
                <input type="text" class="form-control" value="{{ $batiment->id_proprietaire }}" id="id_proprietaire"
                    name="id_proprietaire" placeholder="Batiment Proprietaire" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="id_proprietaire" class="bon-label">Proprietaire :</label>
                <select name="id_proprietaire" class="form-control bon-input mb-3">
                    <option value="">Select Proprietaire</option>
                    @foreach ($proprietaires as $proprietaire)
                        <option value="{{ $proprietaire->id }}"
                            {{ $batiment->id_proprietaire == $proprietaire->id ? 'selected' : '' }}>
                            {{ $proprietaire->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="entree_principale">Entree_principale</label>
                <input type="text" class="form-control" value="{{ $batiment->entree_principale }}" id="entree_principale"
                    name="entree_principale" placeholder="Batiment entree_principale">
            </div>
            <div class="form-group">
                <label for="entree_secondaire">Entree_secondaire</label>
                <input type="text" class="form-control" value="{{ $batiment->entree_secondaire }}" id="entree_secondaire"
                    name="entree_secondaire" placeholder="Batiment entree_secondaire">
            </div>
            <div class="form-group">
                <label for="nbApptDispo">nbApptDispo</label>
                <input type="number" class="form-control" value="{{ $batiment->nbApptDispo }}" id="nbApptDispo"
                    name="nbApptDispo" placeholder="Batiment nbApptDispo">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update batiments</button>
        </form>
    </div>
@endsection
