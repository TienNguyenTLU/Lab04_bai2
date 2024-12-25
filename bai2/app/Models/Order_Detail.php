<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    public $table = 'order_details';
    protected $fillable = ['order', 'product', 'order_id', 'product_id', 'quantity'];
    public function order()
    {
        return $this->belongsTo(Order::class); 
    }
    public function product()
    {
        return $this->belongsTo(Product::class);  
    }
}