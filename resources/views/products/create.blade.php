@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 700px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Crear Producto</h3>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        </div>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">SKU *</label>
                <input type="text" name="sku" value="{{ old('sku') }}"
                       class="form-control @error('sku') is-invalid @enderror">
                @error('sku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="description" rows="3"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Precio *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Stock *</label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}"
                           class="form-control @error('stock') is-invalid @enderror">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría *</label>
                <select name="category_id"
                        class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input type="hidden" name="active" value="0">
                <input class="form-check-input" type="checkbox" name="active" value="1"
                       {{ old('active', true) ? 'checked' : '' }}>
                <label class="form-check-label">Producto Activo</label>
            </div>

            <button class="btn btn-primary">Crear Producto</button>
        </form>
    </div>
</div>
@endsection
