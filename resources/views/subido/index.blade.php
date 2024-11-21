@extends('base')

@section('content')
<div class="container">
    <h1>Lista de Imágenes</h1>

    <a href="{{ route('subido.create') }}" class="btn btn-primary mb-3">Subir Nueva Imagen</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Vista previa</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subidos as $subir)
                <tr>
                    <td>{{ $subir->id }}</td>
                    <td>{{ $subir->originalName }}</td>
                    <td><img src="{{ route('subido.image' , $subir->id) }}" alt="$subir->originalName" style="object-fit: cover; object-position: center; width: 5rem; height: 5rem;"></td>
                    <td>{{ $subir->created_at }}</td>
                    <td>{{ $subir->updated_at }}</td>
                    <td>
                        <a href="{{ route('subido.show', $subir->id) }}" class="btn btn-info">View</a>

                        <a href="{{ route('subido.edit', $subir->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('subido.destroy', $subir->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure thate you want delete thats image?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay imágenes disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
