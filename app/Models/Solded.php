<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solded extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_data',
        'total_amount',
        'customer_name',
        'email',
        'mobile_number',
    ];
}
