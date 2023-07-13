@extends('layouts.app')

@section('title', 'Batiment-index')

@section('content')
    <h1 class="mb-4">Liste des bâtiments</h1>
    <a href="{{ route('batiments.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle-fill"></i> Add batiments
    </a>
    <div class="input-group mb-4">
        <form method="GET" action="{{ route('batiments.index') }}">
            <input type="text" class="form-control" placeholder="Rechercher par nom" aria-label="Search by name"
                aria-describedby="button-addon2" name="search" value="{{ request()->query('search') }}">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="bi bi-search"></i> Rechercher
            </button>
        </form>
    </div>


    @if ($message = session('success'))
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        </script>
    @endif

    <table class="table table-bordered bon-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Propriétaire</th>
                <th>Entrée principale</th>
                <th>Entrée secondaire</th>
                <th>Nombre d'appartements disponibles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($batiments as $batiment)
                <tr>
                    <td>{{ $batiment->nom }}</td>
                    <td>{{ $batiment->adresse }}</td>
                    <td>{{ $batiment->proprietaire->nom }} </td>
                    <td>{{ $batiment->entree_principale }}</td>
                    <td>{{ $batiment->entree_secondaire }}</td>
                    <td>{{ $batiment->nbApptDispo }}</td>
                    <td>
                        <form action="{{ route('batiments.destroy', $batiment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info bon-button" href="{{ route('batiments.show', $batiment->id) }}">
                                <i class="bi bi-eye-fill"></i> Voir
                            </a>
                            <a class="btn btn-primary bon-button" href="{{ route('batiments.edit', $batiment->id) }}">
                                <i class="bi bi-pencil-fill"></i> Modifier
                            </a>
                            <button type="submit" class="btn btn-danger bon-button" onclick="confirmDelete()">
                                <i class="bi bi-trash-fill"></i> Supprimer
                            </button>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $batiments->links() }}
@endsection
