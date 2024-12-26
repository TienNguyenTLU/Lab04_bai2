@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sửa thông tin khách hàng</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" placeholder="Nhập tên khách hàng" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Nhập địa chỉ khách hàng" required>{{ $customer->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" placeholder="Nhập email khách hàng" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
