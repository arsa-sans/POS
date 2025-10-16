<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;
    public function order()
    {
        return $this->hasMany(order::class);
    }
    public function product()
    {
        return $this->hasMany(product::class);
    }
    
}
