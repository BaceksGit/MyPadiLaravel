<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_name', 'symptoms', 'cause', 'severity_level', 'description',
        'disease_image', 'medicine_name', 'application_method', 'purchase_link', 'medicine_image',
    ];
}
