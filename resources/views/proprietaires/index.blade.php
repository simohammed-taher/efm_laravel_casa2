@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste de Proprétaires</h1>
                <a href="{{ url('proprietaires/create') }}" class="btn btn-primary">Ajouter une Proprietaires</a>

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

                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Cin</th>
                            <th>Email</th>
                            <th>Fonction</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proprietaires as $proprietaire)
                            <tr>
                                <td>{{ $proprietaire->id }}</td>
                                <td>{{ $proprietaire->nom }}</td>
                                <td>{{ $proprietaire->prenom }}</td>
                                <td>{{ $proprietaire->cin }}</td>
                                <td>{{ $proprietaire->email }}</td>
                                <td>{{ $proprietaire->fonction }}</td>
                                <td>
                                    <a href="{{ url('/proprietaires/' . $proprietaire->id . '/edit') }}"
                                        title="Edit proprietaire">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> modifier
                                        </button>
                                    </a>
                                    <form action="{{ url('/proprietaires/' . $proprietaire->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                            onclick="return confirm('Confirm delete?')">
                                            <i class="bi bi-trash"></i> supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Aucune proprietaire disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
