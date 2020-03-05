<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';//กำหนดชื่อตารางในฐานข้อมูล
    protected $fillable =['title','price','typebooks_id'];//กำหนดให้สามารถเพิ่มข้อมูล

    public function typebooks(){
        return $this->belongsTo(typebooks::class, 'typebooks_id');//FK
    }
}

