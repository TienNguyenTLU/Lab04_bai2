@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-8 bg-gray-50 shadow-lg rounded-lg"
        style="max-width: 900px; display: flex; flex-direction: column; justify-content: flex-start;">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Chỉnh sửa chi tiết đơn hàng</h2>
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <form action="{{ route('order_details.update', $order_detail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="customer_id" class="block text-gray-700 font-medium mb-2">Chọn khách hàng</label>
                    <select id="customer_id" name="customer_id" class="form-control">
                        <option value="">-- Chọn khách hàng --</option>
                        @foreach ($customers as $cus)
                            <option value="{{ $cus->id }}"
                                {{ old('customer_id', $order_detail->order->customer_id) == $cus->id ? 'selected' : '' }}>
                                {{ $cus->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="text-red-500 text-sm mt-1 text-danger"> <i class="bi bi-exclamation-octagon"></i> 
                            {{ $message }}</div>
                    @enderror
                    <br />
                </div>
                <div class="mb-6">
                    <label for="product_id" class="block text-gray-700 font-medium mb-2">Chọn sản phẩm</label>
                    <select id="product_id" name="product_id" class="form-control">
                        <option value="">-- Chọn sản phẩm --</option>
                        @foreach ($products as $pr)
                            <option value="{{ $pr->id }}"
                                {{ old('product_id', $order_detail->product_id) == $pr->id ? 'selected' : '' }}>
                                {{ $pr->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="text-red-500 text-sm mt-1 text-danger"> <i class="bi bi-exclamation-octagon"></i>
                            {{ $message }}</div>
                    @enderror
                    <br />
                </div>
                <div class="mb-6">
                    <label for="return_order_date" class="block text-gray-700 font-medium mb-2">Ngày đặt hàng</label>
                    <input type="date" id="return_order_date" name="return_order_date" class="form-control"
                        value="{{ old('return_order_date', $order_detail->order->order_date) }}">
                    @error('return_order_date')
                        <div class="text-red-500 text-sm mt-1 text-danger"> <i class="bi bi-exclamation-octagon"></i>
                            {{ $message }}</div>
                    @enderror
                    <br>
                </div>
                <div class="mb-6">
                    <label for="return_quantity" class="block text-gray-700 font-medium mb-2">Số lượng</label>
                    <input type="text" id="return_quantity" name="return_quantity" class="form-control"
                        value="{{ old('return_quantity', $order_detail->quantity) }}">
                    @error('return_quantity')
                        <div class="text-red-500 text-sm mt-1 text-danger"> <i class="bi bi-exclamation-octagon"></i>
                            {{ $message }}</div>
                    @enderror
                    <br>
                </div>
                <div class="mb-6">
                    <label for="return_status" class="block text-gray-700 font-medium mb-2">Trạng thái thanh toán</label>
                    <select id="return_status" name="return_status" class="form-control">
                        <option value="1" {{ old('return_status', $order_detail->order->status) == 1 ? 'selected' : '' }}>
                            Đã thanh toán
                        </option>
                        <option value="0" {{ old('return_status', $order_detail->order->status) == 0 ? 'selected' : '' }}>
                            Chưa thanh toán
                        </option>
                    </select>
                    @error('return_status')
                        <div class="text-red-500 text-sm mt-1 text-danger"> <i class="bi bi-exclamation-octagon"></i>
                            {{ $message }}</div>
                    @enderror
                    <br>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('order_details.index') }}" class="btn btn-info text-white">Hủy bỏ</a>
                </div>
                <br />
            </form>
        </div>
    </div>
@endsection
