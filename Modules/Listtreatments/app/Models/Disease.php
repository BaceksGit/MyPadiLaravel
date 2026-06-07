<?php

namespace Modules\Listtreatments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Listtreatments\Database\Factories\DiseaseFactory;

class Disease extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    //put all of your table attributes here
    protected $fillable = [
        'disease_name',
        'symptoms',
        'cause',
        'severity_level',
        'description',
        'disease_image',
        'medicine_image',
        'application_method',
        'purchase_link',
        'medicine_image',
    ];

    // protected static function newFactory(): DiseaseFactory
    // {
    //     // return DiseaseFactory::new();
    // }



}
