<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


    protected $guarded = ['id'];

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
