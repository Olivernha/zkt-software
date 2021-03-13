<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone','address','company','photo'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];
}
