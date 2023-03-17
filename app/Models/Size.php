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
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function color()
    {
        return $this->belongsToMany(Color::class);
    }
}
