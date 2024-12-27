<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderby('created_at', 'desc')->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);
        [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là một chuỗi.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.integer' => 'Số lượng sản phẩm phải là số nguyên.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1.'


        ];
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);
        [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là một chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.integer' => 'Số lượng sản phẩm phải là số nguyên.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1.'
        ];

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
    
}
