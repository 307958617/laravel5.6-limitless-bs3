<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'pid','name','manager','phone','remarks','order','status'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function getPidAttribute($value)
    {
        $p_name = $this->find($value)['name'];
        if($p_name) {
            return [$value,$p_name];//将pid和名称同时传递到表格里面，在编辑部门的时候需要用到pid，在显示表格的时候，需要用到p_name
        }
        return [$value,'/'];
    }

    public function getStatusAttribute($value)
    {
        if( $value=== 'T') {
            return '已启用';
        }
        return '未启用';
    }
}
