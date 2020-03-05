@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md col-md-offset-2">
            <div class = "care-header h3 ">
                เพิ่มข้อมูลรายการหนังสือ
            </div>
            <div class = "card-body">
            
                {!! Form::open(array('url'=>'books','files'=>true)) !!}
                <div class = "Form-group">
                    <?=Form::label('title','ชื่อหนังสือ'); ?>
                    <?=Form::text('title',null,['class'=>'form-control','placeholder'=>'ชื่อหนังสือ']); ?>
                </div>
                <?=Form::label('price','ราคา'); ?>
                    <?=Form::text('price',null,['class'=>'form-control','placeholder'=>'ราคา']); ?>
            </div>
            <div class="form-group">
                {!!Form::label('typebooks_id','ประเภทหนังสือ');!!}
                <?=Form::select('typebooks_id',
                App\typebooks::all()->pluck('name','id'),null,['class'=>'form-control','placeholder'=>'เลือกประเภทหนังสือ']); ?>

            </div>
            <div class="form-group">
                {!! Form::label('image','รูปภาพ');!!}
                <?=Form::file('image',null,['class'=>'form-control'])?>
            </div>
            @if (count($errors) >0)
            <div class="alert alert-warning">
            <ul>
            @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                  </ul>
                  </div>
                  @endif
            <div class="form-group">
                <?=form::submit('บันทึก',['class'=>'btn btn-primary']);?>
            </div>
            
            
            {!!Form::close()!!}
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
