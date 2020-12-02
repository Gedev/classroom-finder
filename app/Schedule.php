<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'classroom_id',
        'section',
        'course_name',
        'start_at',
        'end_at',
        'day',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
