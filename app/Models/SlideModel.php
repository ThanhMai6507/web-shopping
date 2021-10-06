<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{
    use HasFactory; public $timestamps = false;
    protected $fillable = [
        'ten_slide ','img_slide','trang_thai'
    ];

    protected $primaryKey = 'id';
    protected $table = 'slide_models';

    
}
