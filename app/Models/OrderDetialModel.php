<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetialModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_card_id ','order_name_product','order_qty','order_price'
    ];

    protected $primarykey = 'id';
    protected $table = 'order_card_detail';

    public function order_card(){
        return $this -> belongsTo('App\Models\OrderModel','order_card_id','id');
    }

  

}
