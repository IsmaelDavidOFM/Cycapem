<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class CustomUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'social_network',
        'address',
        'picture',
        'status',
        'created_at',
        'uptade_at',
    ];

    public $timestamps = false;
}
