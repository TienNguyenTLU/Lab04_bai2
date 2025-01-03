<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use HasFactory;
  protected  $fillable = ['name','price','quantity','description'];

  public function order_detail()
  {
      return $this->belongsTo(Order_Detail::class); 
  }

}