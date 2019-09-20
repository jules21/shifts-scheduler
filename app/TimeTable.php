<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $guarded = ['id'];
    protected $table = 'time_tables';

    public function user()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }
    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }

}
