<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];
    protected $fillable = [
        'category_id', 'product_name', 'product_code','buying_price','selling_price','supplier_id','buying_date','image','product_quantity'
    ];
}
