<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'menu_type ','Slug_Menu_type','Trang_Thai'
    ];

    protected $primarykey = 'id';
    protected $table = 'menutype';

    // Menu Chứa nhiều thể loại
    public function categorymodel(){
        return $this -> hasMany('App\Models\CategoryModel');
    }

}
