<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;

class Customer extends Model
{
        use FactoriesHasFactory;
        protected $fillable = ['name', 'address', 'phone', 'email'];

        public function orders()
        {
            return $this->hasMany(Order::class, 'customer_id', 'id'); 
        }
}
