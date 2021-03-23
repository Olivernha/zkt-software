<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'name', 'email', 'phone','address','photo'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];
}
