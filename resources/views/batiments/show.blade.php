@extends('layouts.app')

@section('content')
    <h1>Planning Details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <td>{{ $batiment->nom }} </td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $batiment->adresse }} </td>
        </tr>
        <tr>
            <th>Propriétaire</th>
            <td>{{ $batiment->proprietaire->nom }} {{ $batiment->proprietaire->prenom }}</td>
        </tr>
        <tr>
            <th>Entrée principale</th>
            <td>{{ $batiment->entree_principale }}</td>
        </tr>
        <tr>
            <th>Entrée secondaire</th>
            <td>{{ $batiment->entree_secondaire }}</td>
        </tr>
        <tr>
            <th>Nombre d'appartements disponibles</th>
            <td>{{ $batiment->nbApptDispo }}</td>
        </tr>
    </table>
    <a href="{{ route('batiments.edit', $batiment->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('batiments.destroy', $batiment->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this batiment ?')">Delete</button>
    </form>
    <a href="{{ route('batiments.index') }}" class="btn btn-secondary">Back to Batiment</a>
@endsection
