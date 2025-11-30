@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 700px;">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Detalle del Producto</h3>
            <div>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">Editar</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>

        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
            <li class="list-group-item"><strong>SKU:</strong> {{ $product->sku }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $product->name }}</li>
            <li class="list-group-item"><strong>Descripción:</strong> {{ $product->description ?? 'Sin descripción' }}</li>
            <li class="list-group-item"><strong>Categoría:</strong> {{ $product->category->name }}</li>
            <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</li>
            <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }} unidades</li>
            <li class="list-group-item">
                <strong>Estado:</strong>
                <span class="badge bg-{{ $product->active ? 'success' : 'danger' }}">
                    {{ $product->active ? 'Activo' : 'Inactivo' }}
                </span>
            </li>
            <li class="list-group-item"><strong>Creado:</strong> {{ $product->created_at->format('d/m/Y H:i:s') }}</li>
            <li class="list-group-item"><strong>Actualizado:</strong> {{ $product->updated_at->format('d/m/Y H:i:s') }}</li>
        </ul>

        <form action="{{ route('products.destroy', $product) }}" method="POST"
              onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger w-100">Eliminar Producto</button>
        </form>
    </div>
</div>
@endsection
