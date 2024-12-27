@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sửa thông tin khách hàng</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $customer->name) }}" placeholder="Nhập tên khách hàng">
            @error('name')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Nhập địa chỉ khách hàng" required>{{ old('address', $customer->address) }}</textarea>
            @error('address')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" placeholder="Nhập số điện thoại" required>
            @error('phone')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $customer->email) }}" placeholder="Nhập email khách hàng" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
