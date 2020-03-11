@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">

                <div class="card mt-3">
                    <div class="card-header h3">

                  แก้ไขข้อมูลหนังสือ {{ $book->title }}

                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

            <?= Form::model($book,array('url'=>'books/'.$book->id,
            'method' =>'put','files'=>true)) ?>

                <div class="form-group">
                    <?=Form::label('title','ชื่อหนังสือ'); ?>
                    <?=Form::text('title',null,['class'=>'form-control','placeholder'=>'ชื่อหนังสือ']); ?>
                </div>

                <div class="form-group">
                    {!! Form::label('price','ราคา'); !!}
                    {!! Form::text('price',null,['class'=>'form-control','placeholder' => 'เช่น100,100.25']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('typebooks_id','ประเภทหนังสือ'); !!}
                    <?= Form::select('typebooks_id',App\Typebooks::all()->pluck('name','id'),null,['class'=>'form-control',
                    'placeholder'=>'กรุณาเลือกประเภทหนังสือ..']); ?>
                </div>

                <div>
                <a href="{{ asset('images/'.$book->image) }}"><img src="{{ asset('images/resize/'.$book->image) }}"
                    style="width:100px"></a>

                </div>

                <br>
                <div class="form-group">
                    {!! Form::label('image','แก้ไขรูปภาพ'); !!}
                    <?= Form::file('image',null,['class'=>'form-control']) ?>
                </div>

                <div class="form-group">
                    <?= Form::submit('บันทึก',['class'=>'btn btn-primary']); ?>
                </div>
                {!! Form::close() !!}
                </div>
                </div>
        </div>
    </div>
</div>
@endsection