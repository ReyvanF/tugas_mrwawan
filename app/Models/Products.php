<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['category_id', 'product_name', 'price', 'stock', 'unit'];
    public function categories() {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
