<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  LoginStatus extends Model
{
    use HasFactory;
    public static $isLogged;
    public function _construct()
    {
        $isLogged = false;
    }
    

}
