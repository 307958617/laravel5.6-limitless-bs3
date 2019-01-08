<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'title';

    protected $fillable = [
        'description','order','isFirst','status','remarks'
    ];

}
