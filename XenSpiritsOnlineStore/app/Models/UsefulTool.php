<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsefulTool extends Model
{
    use HasFactory;

    public static function xulychuoi($oldstring)
    {
       $trimmed = ltrim($oldstring,'["');
       $trimmed = rtrim($trimmed,'"]');
       return $trimmed; 
    }
}