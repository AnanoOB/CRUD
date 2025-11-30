@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Título --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Listado de Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">+ Nuevo Producto</a>
    </div>

    {{-- Buscador --}}
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Buscar por nombre, SKU o categoría..."
                value="{{ request('search') }}"
            >

            <button class="btn btn-primary">Buscar</button>

            @if(request('search'))
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Limpiar</a>
            @endif
        </div>
    </form>

    {{-- Tabla --}}
    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0 text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>SKU</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Activo</th>
                            <th width="180px">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->active)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">
                                    Ver
                                </a>

                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Deseas eliminar este producto?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-3">
                                No se encontraron productos.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Paginación --}}
    <div class="mt-3">
        {{ $products->appends(request()->query())->links() }}
    </div>

</div>
@endsection

