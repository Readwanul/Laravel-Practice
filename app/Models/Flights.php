<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'airline',
        'departure_city',
        'arrival_city',
        'departure_time',
        'arrival_time',
        'capacity',
        'price',
        'status',
    ];

}
