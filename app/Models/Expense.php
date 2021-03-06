<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'details', 'amount','expense_date'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];
}
