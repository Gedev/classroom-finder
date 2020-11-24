<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'id',
        'floor',
        'nb_of_seats',
        'has_whiteboard',
        'has_projector',
    ];
}
