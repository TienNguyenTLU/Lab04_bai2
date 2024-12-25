@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-8 bg-gray-50 shadow-lg rounded-lg" style="max-width: 900px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Tạo mới chi tiết đơn hàng</h2>
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <form action="{{ route('order_details.store') }}" method="POST">
                @csrf

                <!-- Select Customer -->
                <div class="mb-6">
                    <label for="customer_id" class="block text-gray-700 font-medium mb-2">Chọn khách hàng</label>
                    <select id="customer_id" name="customer_id" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
                        <option value="">-- Chọn khách hàng --</option>
                        @foreach ($customers as $cus)
                            <option value="{{ $cus->id }}" {{ old('customer_id') == $cus->id ? 'selected' : '' }}>
                                {{ $cus->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Select Product -->
                <div class="mb-6">
                    <label for="product_id" class="block text-gray-700 font-medium mb-2">Chọn sản phẩm</label>
                    <select id="product_id" name="product_id" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
                        <option value="">-- Chọn sản phẩm --</option>
                        @foreach ($products as $pr)
                            <option value="{{ $pr->id }}" {{ old('product_id') == $pr->id ? 'selected' : '' }}>
                                {{ $pr->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Order Date -->
                <div class="mb-6">
                    <label for="order_date" class="block text-gray-700 font-medium mb-2">Ngày đặt hàng</label>
                    <input type="date" id="order_date" name="order_date" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200" value="{{ old('order_date') }}">
                    @error('order_date')
                        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Quantity -->
                <div class="mb-6">
                    <label for="quantity" class="block text-gray-700 font-medium mb-2">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200" value="{{ old('quantity') }}" min="1">
                    @error('quantity')
                        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Select Status -->
                <div class="mb-6">
                    <label for="status" class="block text-gray-700 font-medium mb-2">Trạng thái thanh toán</label>
                    <select id="status" name="status" class="p-3 border border-gray-300 rounded w-full focus:ring focus:ring-blue-200">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Đã thanh toán</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-2"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                    <a href="{{ route('order_details.index') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection
