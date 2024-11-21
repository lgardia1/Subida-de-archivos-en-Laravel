@extends('base')

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

    <form action="{{ route('subido.update', $subido->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="originalName" class="form-label">Nombre</label>
            <input type="text" name="originalName" id="originalName" class="form-control" value="{{ $subido->originalName }}" required>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Archivo de Imagen (Opcional)</label>
            <input type="file" name="file" id="file" class="form-control" accept="image/*">
            <p class="mt-2">Imagen actual:</p>
            <img src="{{ route('subido.image', $subido->id) }}" alt="{{ $subido->nombre }}" width="200">
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="{{ route('subido.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
