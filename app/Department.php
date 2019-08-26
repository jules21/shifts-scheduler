<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function positions()
    {
        $this->hasMany('App\Position');
    }
    //
    public function users()
    {
        $this->hasMany('App\User');
    }
}
