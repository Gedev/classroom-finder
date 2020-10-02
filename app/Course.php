<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{

    use Notifiable;

    protected $fillable = [
        'id',
        'name',
        'classroom_id',
        'section_id',
    ];

    /**
     * Each tag can have many links.
     *
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
