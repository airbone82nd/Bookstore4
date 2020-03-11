<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeBooks;

class TypeBooksController extends Controller
{
    public function index(){
        $typebooks = TypeBooks::all();//แสดงข้อมูลทั้งหมด
        //$typebooks = TypeBooks::orderBy('id','desc')->get();//แสดงข้อมูลทั้งหมด
        $count = typebooks::count();//นับจำนวนแถวทั้งหมด
        $typebooks=typebooks::paginate(3);//การแบ่ง
        return view('typebooks.index',[
            'typebooks' =>$typebooks,
            'count' =>$count
        ]);
    }
    public function destroy($id){
        //TypeBooks::find($id)->delete();
        Typebooks::destroy($id);//
        return back();
    }
}

