<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_name',
        'size',
        'attachable_type',
        'attachable_id',
        'extension',
        'mime_type',
    ];

    public function attachable()
    {
        return $this->morphTo();
    }
}
