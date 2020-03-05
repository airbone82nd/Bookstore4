@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md col-md-offset-2">
            <div class="card">

                <div class="card header h3">

                    แสดงข้อมูลประเภทหนังสือ [ ทั้งหมด{{$count}} รายการ]

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th> รหัส</th>
                            <th> ประเภทหนังสือ</th>
                            <th>เครื่องมือ </th>
                        </tr>
                        @foreach ($typebooks as $typebook)
                        <tr>
                            <td>{{$typebook->id}}</td>
                            <td>{{$typebook->name}}</td>
                        <td> <a href="{{url('/typebooks/destroy/'.$typebook->id)}}">ลบ</a></td>
                        </tr>


                        @endforeach
                    </table>
                    {!! $typebooks->render() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection