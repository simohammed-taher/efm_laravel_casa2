@extends('layouts.app')

@section('title', 'Batiment-index')

@section('content')
    <h1 class="mb-4" style="text-decoration: underline"><em>Liste des bâtiments</em></h1>
    <a href="{{ route('batiments.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle-fill"></i> Add batiments
    </a>
    <div class="input-group mb-4">
        <form method="GET" action="{{ route('batiments.index') }}">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher par nom"
                            aria-label="Search by name" aria-describedby="button-addon2" name="search"
                            value="{{ request()->query('search') }}">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
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
                <th style="text-align: center">Nom</th>
                <th style="text-align: center">Adresse</th>
                <th style="text-align: center">Propriétaire</th>
                <th style="text-align: center">Entrée principale</th>
                <th style="text-align: center">Entrée secondaire</th>
                <th style="text-align: center">Nombre d'appartements disponibles</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($batiments as $batiment)
                <tr>
                    <td style="text-align: center">{{ $batiment->nom }}</td>
                    <td style="text-align: center">{{ $batiment->adresse }}</td>
                    <td style="text-align: center">{{ $batiment->proprietaire->nom }} </td>
                    <td style="text-align: center">{{ $batiment->entree_principale }}</td>
                    <td style="text-align: center">{{ $batiment->entree_secondaire }}</td>
                    <td style="text-align: center">{{ $batiment->nbApptDispo }}</td>
                    <td style="text-align: center">
                        <form action="{{ route('batiments.destroy', $batiment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info bon-button" href="{{ route('batiments.show', $batiment->id) }}">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a class="btn btn-primary bon-button" href="{{ route('batiments.edit', $batiment->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <button type="submit" class="btn btn-danger bon-button" onclick="confirmDelete()">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $batiments->links() }}
@endsection
