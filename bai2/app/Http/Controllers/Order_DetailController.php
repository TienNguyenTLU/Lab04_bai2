<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class Order_DetailController extends Controller
{
    public function index()
    {
        $order_details = Order_Detail::with('order', 'product')->paginate(5);
        return view('order_details.index', compact('order_details'));
    }

    public function create(Request $request)
{
    // Tìm thông tin sản phẩm và khách hàng theo dữ liệu từ request
    $product = Product::find($request->product_id);
    $customer = Customer::find($request->customer_id);
    $order = Order::find($request->order_id);

    if (!$product || !$customer || !$order) {
        return redirect()->route('order_details.create')->with('error', 'Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.');
    }

    // Tạo mới chi tiết đơn hàng
    $order_detail = Order_Detail::create([
        'order_id' => $request->order_id,
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'customer_id' => $request->customer_id,
        'order_date' => $request->order_date,
        'status' => $request->status
    ]);

    return redirect()->route('order_details.index')->with('success', 'Tạo chi tiết đơn hàng thành công.');
}


    public function store(Request $request)
    {
        Order_Detail::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $product = Product::find($request->product_id);

        return redirect()->route('order_details.index');
    }

    public function show($id)
    {
        $order_detail = Order_Detail::with('order', 'product')->findOrFail($id);
        return view('order_details.show', compact('order_detail'));
    }

    public function edit($id)
    {
        $order_detail = Order_Detail::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('order_details.edit', compact('order_detail', 'customers', 'products'));
    }

    public function update(Request $request, $id)
{
    // Tìm chi tiết đơn hàng và các sản phẩm, khách hàng liên quan
    $order_detail = Order_Detail::findOrFail($id);
    $product = Product::find($request->product_id);
    $customer = Customer::find($request->customer_id);
    
    // Cập nhật thông tin trong bảng Order_Detail
    $order_detail->update([
        'product_id' => $request->product_id,
        'quantity' => $request->return_quantity,
        'customer_id' => $request->customer_id,
        'order_date' => $request->return_order_date,
        'status' => $request->return_status
    ]);
    
    // Lấy đối tượng order từ order_detail
    $order = $order_detail->order; 
    
    // Cập nhật thông tin trong bảng Order
    $order->update([
        'customer_id' => $request->customer_id,  // Cập nhật customer_id cho bảng Order
        'order_date' => $request->return_order_date,
        'status' => $request->return_status
    ]);
    
    $old_quantity = $order_detail->getOriginal('quantity');
    $product->increment('quantity', $old_quantity - $request->return_quantity);  // Điều chỉnh lại số lượng sản phẩm

    return redirect()->route('order_details.index')->with('success', 'Cập nhật thành công');
}


    public function destroy($id)
    {
        
        $order_detail = Order_Detail::findOrFail($id);
        $order_detail->delete();
      
        return redirect()->route('order_details.index');
    }
}