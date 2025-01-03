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
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $order = Order::latest()->first();
        return view('order_details.create', compact('customers', 'products', 'order'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'customer_id' => 'required',
                'order_id' => 'required|exists:orders,id',
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1|max:100',
                'status' => 'required|boolean',
                'order_date' => 'required|date',
            ],
            [
                'product_id.required' => ' Vui lòng chọn thông tin',
                'customer_id.required' => ' Vui lòng chọn thông tin khách hàng',
                'quantity.required' => ' Vui lòng nhập số lượng !',
                'order_date' => 'Vui lòng nhập ngày đặt hàng',
                'quantity.max' => 'Số lượng vượt mức cho phép',
                'quantity.min' => 'Số lượng không được nhỏ hơn 1',
                'quantity.integer' => 'Vui lòng nhập số hợp lệ',
            ]
        );
        $order = Order::create
        (
            [
                'customer_id' => $request->customer_id,
                'order_date' => $request->order_date,
                'status' => $request->status,
                'created_at' => getdate(),
            ]
        );
        $order = Order::latest()->first();
        $orderDetail = Order_Detail::create([
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'order_date' => $request->order_date,
        ]);
        return redirect()->route('order_details.index')->with('success', 'Đơn hàng đã được thêm thành công.');
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
        $order_detail = Order_Detail::findOrFail($id);
        $product = Product::find($request->product_id);
        $customer = Customer::find($request->customer_id);
        $order_detail->update([
            'product_id' => $request->product_id,
            'quantity' => $request->return_quantity,
            'customer_id' => $request->customer_id,
            'order_date' => $request->return_order_date,
            'status' => $request->return_status
        ]);
        $order = $order_detail->order;
        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->return_order_date,
            'status' => $request->return_status
        ]);
        $old_quantity = $order_detail->getOriginal('quantity');
        $product->increment('quantity', $old_quantity - $request->return_quantity);
        return redirect()->route('order_details.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $order_detail = Order_Detail::findOrFail($id);
        $order = Order::findOrFail($order_detail->order_id);
        $order->delete();
        return redirect()->route('order_details.index');
    }
}