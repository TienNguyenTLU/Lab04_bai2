

@section('content')
    <h1>Chi Tiết Đơn Hàng</h1>
    <p><strong>Đơn Hàng:</strong> {{ $orderDetail->order->id }}</p>
    <p><strong>Sản Phẩm:</strong> {{ $orderDetail->product->name }}</p>
    <p><strong>Số Lượng:</strong> {{ $orderDetail->quantity }}</p>
    <p><strong>Giá:</strong> {{ $orderDetail->product->price }}</p>
@endsection
