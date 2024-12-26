<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['required', 'string', 'regex:/^(\+84|0)\d{9,10}$/'],
            'email' => ['required ', 'email' ,'unique:customers', 'email|max:255'],
        ], [
            'name.required' => 'Tên khách hàng là bắt buộc.',
            'name.string' => 'Tên khách hàng phải là một chuỗi.',
            'name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);        
    
        // Store the validated customer data
        Customer::create($request->all());
    
        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được thêm thành công!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['required', 'string', 'regex:/^(\+84|0)\d{9,10}$/'],
            'email' => ['required', 'email', 'unique:customers,email,' . $customer->id, 'max:255'],
        ], [
            'name.required' => 'Tên khách hàng là bắt buộc.',
            'name.string' => 'Tên khách hàng phải là một chuỗi.',
            'name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]); 
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Thông tin khách hàng đã được cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
    
        if ($customer->orders()->count() > 0) {
            return redirect()->route('customers.index')->with('error', 'Không thể xóa khách hàng vì đã có đơn hàng liên quan.');
        }
    
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được xóa.');
    }    
}