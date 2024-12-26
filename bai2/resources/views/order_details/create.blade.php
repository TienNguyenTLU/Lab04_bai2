@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-8 bg-gray-50 shadow-lg rounded-lg" style="max-width: 900px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Thêm chi tiết đơn hàng</h2>
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <form action="{{ route('order_details.store') }}" method="POST">
    @csrf
    @method('POST')

    <!-- Chọn khách hàng -->
    <div class="mb-6">
        <label for="customer_id" class="block text-gray-700 font-medium mb-2">Chọn khách hàng</label>
        <select id="customer_id" name="customer_id" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
            <option value="">-- Chọn khách hàng --</option>
            @foreach ($customers as $cus)
                <option value="{{ $cus->id }}">
                    {{ $cus->name }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
        @enderror
    </div>

    <!-- Chọn sản phẩm -->
    <div class="mb-6">
        <label for="product_id" class="block text-gray-700 font-medium mb-2">Chọn sản phẩm</label>
        <select id="product_id" name="product_id" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
            <option value="">-- Chọn sản phẩm --</option>
            @foreach ($products as $pr)
                <option value="{{ $pr->id }}">
                    {{ $pr->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Ngày đặt hàng -->
    <!-- Order Date -->
<div class="mb-6">
    <label for="order_date" class="block text-gray-700 font-medium mb-2">Ngày đặt hàng</label>
    <input type="date" id="order_date" name="order_date" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200" value="{{ old('order_date') }}">
</div>


    <!-- Số lượng -->
    <div class="mb-6">
        <label for="quantity" class="block text-gray-700 font-medium mb-2">Số lượng</label>
        <input type="text" id="quantity" name="quantity" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
    </div>

    <!-- Trạng thái thanh toán -->
    <div class="mb-6">
        <label for="status" class="block text-gray-700 font-medium mb-2">Trạng thái thanh toán</label>
        <select id="status" name="status" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
            <option value="1">Đã thanh toán</option>
            <option value="0">Chưa thanh toán</option>
        </select>
    </div>

    <!-- Order ID -->
    <input type="hidden" name="order_id" value="{{ $order->id }}">

    <!-- Nút gửi form -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </div>
</form>

@endsection
