<?php

namespace App;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}