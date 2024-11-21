@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Imagen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $image->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Archivo de Imagen (Opcional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <p class="mt-2">Imagen actual:</p>
            <img src="{{ asset($image->path) }}" alt="{{ $image->nombre }}" width="200">
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="{{ route('images.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
