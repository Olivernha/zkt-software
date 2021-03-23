<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_name'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
