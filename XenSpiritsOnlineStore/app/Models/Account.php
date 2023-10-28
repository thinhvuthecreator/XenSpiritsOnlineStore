<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'staff_id',
        'client_id'
];

/** 
* @var array<int, string>
*/
protected $hidden = [
   'password',
   'remember_token',
];

/**
* The attributes that should be cast.
*
* @var array<string, string>
*/
protected $casts = [
   'email_verified_at' => 'datetime',
   'password' => 'hashed',
];

}
