<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','gender','birthday', 'email','confirmation_token','avatar','education','title','post','phone','sf_id','remarks','order', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departments()
    {
        return $this->belongsToMany('App\Department');
    }

    public function getBirthdayAttribute($value)
    {
        $age = new Carbon($value);
        return $age->diffInYears();
    }
}
