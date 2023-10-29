<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quantity_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'size_id',
        'quantity',
    ];
}