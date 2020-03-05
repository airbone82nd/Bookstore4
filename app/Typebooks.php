<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBooks extends Model
{
    protected $table = 'typebooks'; //กำหนดชื่อตารางให้ตรงกับฐานข้อมูล

    public function books(){
        return $this->hasMany(books::class);//One to Many
    }
}
