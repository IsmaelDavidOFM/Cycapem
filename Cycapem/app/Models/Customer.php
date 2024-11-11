<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Nombre de la tabla en la base de datos

    // Los atributos que se pueden asignar en masa
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'address',
        'company',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
