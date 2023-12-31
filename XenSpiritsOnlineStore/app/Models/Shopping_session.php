<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_session extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'payment_type',
        'purchase_status'
    ];
}
