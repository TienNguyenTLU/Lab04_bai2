<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Customer extends Model
{
        protected $fillable = ['name', 'address', 'phone', 'email'];
}
