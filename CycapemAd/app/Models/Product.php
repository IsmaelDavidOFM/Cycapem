<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'existens',
        'price',
        'picture_1',
        'picture_2',
        'picture_3',
        'status',
    ];

    public $timestamps = false; // Desactivar las marcas de tiempo
}
