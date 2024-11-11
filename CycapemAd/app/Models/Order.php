<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'category_id',
        'fecha_solicitada',
        'status',
        'created_at',
        'updated_at',
    ];

}
