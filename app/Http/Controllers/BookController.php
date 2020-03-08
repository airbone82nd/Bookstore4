<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Http\Requests\StoreBooksRequest;
use image;
use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = books::with('typebooks')->orderBy('id','desc')->paginate(5);
        return view('books/index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
        $books = new books();
        $books->title = $request->title;
        $books->price = $request->price;
        $books->typebooks_id = $request->typebooks_id;
        if($request->hasFile('image')){
            $filename = str_random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images',$filename);
            Image::make(public_path().'/image'.$filename)->resize(50,50)->save(public_path().'/image/resize'.$filename);
            $books->image = $filename;
        } else {
            $books ->image ='nopic.jpg';

        }
            $books->save();
            return redirect()->action('BookController@index');
        }
   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBooksRequest $request, $id){
        $book = Books::find($id);
        $book->title = $request->title;
        $book->Price = $request->Price;
        $book->typebooks_id = $request->typebooks_id;

        if($request->hasFile('image')){
            //ลบไฟล์เก่าก่อนอัพเดท

            if($book->image !='nopic.jpg'){
                file::delete(public_path() . '\\images\\' .$book->image);
                file::delete(public_path() . '\\images\\resize\\' .$book->image);
            }

            $filename = str_random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/image/'.$filename);
            Image::make(public_path().'/image/'.$filename)->resize(50,50)->save(piblic_path().'/image/resize/'.$filename);
            $books->image = $filename;
        }
        $books->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        if($book->image !='nopic.jpg'){
            file::delete(public_path() . '\\images\\' .$book->image);
            file::delete(public_path() . '\\images\\resize\\' .$book->image);
        }
        $books->save();
            return redirect()->action('BookController@index');
    }
}
