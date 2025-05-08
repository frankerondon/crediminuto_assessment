@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Nuevo Producto</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection