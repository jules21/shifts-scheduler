<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }
    public function department()
    {
        $this->belongsTo('App\Department');
    }
    public function workHours()
    {
        $this->hasMany('App\WorkHour');
    }
}
