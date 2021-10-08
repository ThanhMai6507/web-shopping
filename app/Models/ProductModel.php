<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_product ',
        'slug_product',
        'code',
        'description',
        'img_product',
        'price',
        'category_id',
        'product_keywords',
        'detail',
        'Trang_Thai'
    ];

    protected $primaryKey = 'id';
    protected $table = 'product';

      // San pham thuoc 1 danh muc //with
    public function product_category(){
        return $this -> belongsTo('App\Models\CategoryModel','category_id','id');
    }
    

}
