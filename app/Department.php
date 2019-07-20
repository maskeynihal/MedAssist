<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable =[
        'department_id',
        'department_name'
    ];

    // public function doctor(){
    //     return $this->hasMany('App\Doctor');
    // }
     public function doctor()
    {
    	return $this->hasMany(App\Doctor::class,'department_id','department_id');
    }
}
