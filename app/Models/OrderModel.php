<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_name ','order_address','order_phone','payment_method','order_totol','status'
    ];

    protected $primaryKey = 'id';
    protected $table = 'order_cart';

    public function order_cart_detail(){
        return $this -> hasMany('App\Models\OrderDetialModel');
    }
}
