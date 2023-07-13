@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Proprietaires</h1>
                <form action="{{ url('proprietaires') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Nom">Nom:</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cin">Cin:</label>
                        <input type="text" name="cin" id="cin" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fonction">Fonction:</label>
                        <input type="text" name="fonction" id="fonction" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Proprietaire</button>
                    <button type="button" class="btn btn-danger text-white"
                        onclick="window.location.href='{{ url('/proprietaires') }}'">List Proprietaire</button>
                </form>
            </div>
        </div>
    </div>
@endsection
