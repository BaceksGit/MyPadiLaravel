<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prediction',
        'confidence',
        'image_path',
    ];
}
