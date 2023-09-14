<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'mainImage',
        'productDescription',
        'productCategory_id'
    ];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(productCategory::class);
    }

    public function detailProductImages():HasMAny
    {
        return $this->hasMany(detailProductImage::class);
    }



}
