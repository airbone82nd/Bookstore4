@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md col-md-offset-2">
            <div class="card">
            <?=link_to('books/create',$title='เพิ่มข้อมูล',['class'=>'btn btn-primary'],$secure=null);?>
                <div class="card header h3">

                    แสดงข้อมูลประเภทหนังสือทั้งหมด[{{ $books->total() }} เล่ม]

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ราคา</th>
                            <th>หมวดหนังสือ</th>
                            <th>รูปภาพ </th>
                        </tr>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->price}} </td>
                            <td>{{$book->typebooks->name}}</td>
                            <td> 
                            <a href="{{ asset('images/'.$book->image) }}"><img src="{{asset('images/resize/'.$book->image)}}"></a></td>
                        </tr>


                        @endforeach
                    </table>
                    
                    {!! $books->render() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection