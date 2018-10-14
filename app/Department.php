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

    public function getPidAttribute($value)
    {
        $p_name = $this->find($value)['name'];
        if($p_name) {
            return $p_name;
        }
        return '/';
    }

    public function getStatusAttribute($value)
    {
        if( $value=== 'T') {
            return '已启用';
        }
        return '未启用';
    }
}
