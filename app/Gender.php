<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';

    protected $fillable = [
        'description','order','isFirst','status','remarks'
    ];

}
