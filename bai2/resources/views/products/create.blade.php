@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Thêm sản phẩm mới</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Đơn giá</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
</div>
</form>
</div>
</div>