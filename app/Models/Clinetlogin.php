<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinetlogin extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'displayName ','email','password','status'
    ];

    protected $primarykey = 'id';
    protected $table = 'clienlogin';
}
