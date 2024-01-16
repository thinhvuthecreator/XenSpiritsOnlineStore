<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout_session extends Model
{
    use HasFactory;
    protected $fillable = [
        "payment_type",
        "cart_id"
    ];
}
