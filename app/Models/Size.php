<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'color_id',
        'content',
        'type',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
