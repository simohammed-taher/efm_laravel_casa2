@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Proprietaires</h1>
                <form action="{{ url('proprietaires/' . $proprietaires->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nom">Nom:</label>
                        <input type="text" name="nom" id="nom" value="{{ $proprietaires->nom }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" id="prenom" value="{{ $proprietaires->prenom }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cin">Cin:</label>
                        <input type="text" name="cin" id="cin" value="{{ $proprietaires->cin }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="{{ $proprietaires->email }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fonction">Fonction:</label>
                        <input type="text" name="fonction" id="fonction" value="{{ $proprietaires->fonction }}"
                            class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Proprietaire</button>
                    <button type="button" class="btn btn-danger text-white"
                        onclick="window.location.href='{{ url('/proprietaires') }}'">List Proprietaires</button>
                </form>
            </div>
        </div>
    </div>
@endsection
