<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'available_until' => 'datetime',
    ];
    protected $fillable = ['shop_id', 'name', 'description', 'quantity', 'available_until', 'image_url'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
