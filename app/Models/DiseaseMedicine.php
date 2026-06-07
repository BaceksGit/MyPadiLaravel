<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseMedicine extends Model
{
    protected $table = 'diseases'; // Use your existing table

    protected $fillable = [
        'disease_name',
        'symptoms',
        'cause',
        'severity_level',
        'description',
        'disease_image',
        'medicine_name',
        'application_method',
        'purchase_link',
        'medicine_image',
    ];
}
