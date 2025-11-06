<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'reservation_time',
        'guests',
        'note',
    ];
}
