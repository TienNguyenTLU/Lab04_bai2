@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm khách hàng mới</h2>
    <form action="{{ route('customers.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên khách hàng" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Nhập địa chỉ khách hàng" required></textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email khách hàng" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
