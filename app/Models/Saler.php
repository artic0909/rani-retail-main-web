<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Saler extends Authenticatable
{
    use Notifiable;

    protected $table = 'salers';

    protected $fillable = [
        'name',
        'email',
        'type',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

