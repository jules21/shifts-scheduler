<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


    protected $guarded = ['id'];

    public function positions()
    {
        return $this->hasMany('App\Position');
    }
    //
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
