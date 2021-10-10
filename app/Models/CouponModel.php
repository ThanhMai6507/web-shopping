<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name_coupon ',
        'code_coupon',
        'coupon_time',
        'coupon_condition',
        'coupon_number'
    ];

    protected $primaryKey = 'id';
    protected $table = 'coupon';
}