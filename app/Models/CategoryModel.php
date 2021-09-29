<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name ','slug_category','trang_Thai','menu_id'
    ];

    protected $primarykey = 'id';
    protected $table = 'category';

    // danh muc thuoc 1 menu //with
    public function categorymenu(){
        return $this -> belongsTo('App\Models\Menutype','menu_id','id');
    }

    // Category Chứa nhiều san pham
    public function productmodel(){
        return $this -> hasMany('App\Models\ProductModel');
    }
    
}
