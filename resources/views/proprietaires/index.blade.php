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
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Nom</th>
                            <th style="text-align: center">Prénom</th>
                            <th style="text-align: center">Cin</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Fonction</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proprietaires as $proprietaire)
                            <tr>
                                <td style="text-align: center">{{ $proprietaire->id }}</td>
                                <td style="text-align: center">{{ $proprietaire->nom }}</td>
                                <td style="text-align: center">{{ $proprietaire->prenom }}</td>
                                <td style="text-align: center">{{ $proprietaire->cin }}</td>
                                <td style="text-align: center">{{ $proprietaire->email }}</td>
                                <td style="text-align: center">{{ $proprietaire->fonction }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ url('/proprietaires/' . $proprietaire->id . '/edit') }}"
                                        title="Edit proprietaire">
                                        <button class="btn btn-primary btn-sm" style="margin-right: 5px">
                                            <i class="bi bi-pencil-square"></i> modifier
                                        </button>
                                    </a>
                                    <form action="{{ url('/proprietaires/' . $proprietaire->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                            onclick="return confirm('Confirm delete?')" style="margin-left: 5px">
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
