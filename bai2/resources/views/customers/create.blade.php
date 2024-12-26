@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm khách hàng mới</h2>
    <form action="{{ route('customers.store')}}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên khách hàng</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên khách hàng">
            @error('name')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ khách hàng" value="{{ old('address') }}">
            @error('address')
                <div class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" >
            @error('phone')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email khách hàng" >
            @error('email')
                <div class="text-red-500 text-sm mt-1 text-danger"><i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
