<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    //
    public function workDay()
    {
        $this->belongsTo('App\WorkDay');
    }
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
