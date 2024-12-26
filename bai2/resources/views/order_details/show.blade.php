@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            
            <p><strong class="text-secondary">Tên người mua:</strong> <span class="text-success ms-2">{{ $order_detail->order->customer->name }}</span></p>
            <p><strong class="text-secondary">Phone number:</strong> <span class="text-success ms-2">{{ $order_detail->order->customer->phone }}</span></p>
            <p><strong class="text-secondary">Email:</strong> <span class="text-success ms-2">{{ $order_detail->order->customer->email }}</span></p>
            <p><strong class="text-secondary">Address:</strong> <span class="text-success ms-2">{{ $order_detail->order->customer->address}}</span></p>               
            <p><strong class="text-secondary">Product:</strong> <span class="text-success ms-2">{{ $order_detail->product->name }}</span></p>
            <p><strong class="text-secondary">Quantity:</strong> <span class="text-success ms-2">{{ $order_detail->quantity }}</span></p>
            <p><strong class="text-secondary">Order_date:</strong> <span class="text-success ms-2">{{ $order_detail->order->order_date }}</span></p>
            <p><strong class="text-secondary">Trạng thái:</strong> 
                <span class="text-success ms-2">
                    @if($order_detail->order->status == 0) Chưa trả @else Đã trả @endif
                </span>
            </p>

            <a href="{{ route('order_details.index') }}" class="btn btn-info text-white">Quay lại</a>
        </div>
    </div>
</div>
@endsection
