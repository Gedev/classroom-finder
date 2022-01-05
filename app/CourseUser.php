<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $table = "courses_users";
    protected $fillable = [
        'user_id', 'course_id', 'start_at', 'end_at', 'day'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
