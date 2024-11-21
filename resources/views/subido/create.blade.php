@extends('base')

@section('content')
<div class="container">
    <h1>Subir Nueva Imagen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subido.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="originalName" class="form-label">Nombre</label>
            <input type="text" name="originalName" id="originalName" class="form-control" value="{{ old('originalName') }}" required>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Archivo de Imagen</label>
            <input type="file" name="file" id="file" class="form-control" accept="image/png, image/jpeg, image/gif" required>
        </div>

        <button type="submit" class="btn btn-primary">Subir Imagen</button>
        <a href="{{ route('subido.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
