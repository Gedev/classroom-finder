<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    protected $fillable = [
        'id',
        'name',
        'category_id',
    ];
}
