<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sitecontroller extends Controller
{
    public function index(){
       $fullname = "Zeedzad007";
       $website = "Zeedzad007Bookstore.com";
            return view('about',[
            'fullname' => $fullname,
            'website' => $website
            ]);
            return view('about');
    }
}