<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->hasOne('App\Position');
    }
    public function department()
    {
       return $this->belongsTo('App\Department');
    }
    public function workHours()
    {
        return $this->hasMany('App\WorkHour');
    }

}
