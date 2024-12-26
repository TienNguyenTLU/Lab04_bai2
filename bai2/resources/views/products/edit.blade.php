@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Sửa thông tin sản phẩm</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}"
                placeholder="Nhập tên sản phẩm" required>
            @error('name')
            <div class="text-red-500 text-sm mt-1 text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="3"
                placeholder="Nhập mô tả sản phẩm" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="text-red-500 text-sm mt-1 text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Đơn giá</label>
            <input type="number" name="price" id="price" class="form-control"
                value="{{ old('price', $product->price) }}" placeholder="Nhập đơn giá" required>
            @error('price')
            <div class="text-red-500 text-sm mt-1 text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control"
                value="{{ old('quantity', $product->quantity) }}" placeholder="Nhập số lượng" required>
            @error('quantity')
            <div class="text-red-500 text-sm mt-1 text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection