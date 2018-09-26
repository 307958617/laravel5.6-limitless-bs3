<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'pid','name','manager','phone','remarks','order'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
