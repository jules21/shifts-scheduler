<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }
    public function shifts()
    {
        $this->hasMany('App\Shift');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function timetables()
    {
        return $this->hasMany('App\Timetable');
    }

}
