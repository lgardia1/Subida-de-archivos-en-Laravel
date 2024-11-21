@extends('base')

@section('content')
<div class="container">
    <h1>Detalles de la Imagen</h1>

    <div class="card">
        <div class="card-header">
            <h4>{{ $subido->originalName }}</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $subido->id }}</p>
            <p><strong>Nombre:</strong> {{ $subido->originalName }}</p>

            <div>
                <strong>Vista Previa:</strong>
                <br>
                <img src="{{ route('subido.image', $subido->id)}}" alt="{{ $subido->originalName }}" width="300">
            </div>

            <p><strong>Creado:</strong> {{ $subido->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Actualizado:</strong> {{ $subido->updated_at->format('d-m-Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('subido.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('subido.edit', $subido->id) }}" class="btn btn-warning">Editar</a>

            <form action="{{ route('subido.destroy', $subido->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta imagen?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
