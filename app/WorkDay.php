<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    public function shifts()
    {
        $this->hasMany('App\Shift');
    }
}
