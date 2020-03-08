@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-log-offset-1">

            <div class="card mt-3">
                <div class="cardheader h3">
                    แก้ไขข้อมูลหนังสือ{{ $book->title }}
                </div>

            <div class="card body">

                @if (count($errors) > 0)
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors-all() as $error)
                            <li>{{ $error }}</li>                          
                        @endforeach
                    </ul>
                </div>
                @endif


                <?= From::model($book,array('url' => 'books/'.$book->id,'method' => 'put','files' => true)) ?>

                <div class="form-group">
                    <?= Form::label('title','ชื่อหนังสือ'); ?>
                    <?= Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'ชื่อหนังสือ']); ?>
                </div>

                
                <div class="form-group">
                    {!! Form::label('Price','ราคา'); !!}
                    {!! Form::text('Price',null, ['class' => 'form-control', 'placeholder' => 'ราคา เช่น50,50.55']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('typebooks_id','ประเภทหนังสือ'); !!}
                    <?= Form::select('typebooks_id', App/Typebooks::all()->pluck('name','id'),null, ['class' => 
                    'form-control', 'placeholder' => 'กรุณาเลือกประเภทหนังสือ*....*']); ?>
                </div>


                        <div>
                        <a href="{{ asset('image/'.$book->image)}}"><img src="{{asset('image/resize/'.$book->image) }}" style="width:100px"></a>
                        </div>
            
                        <br>

                        <div class="form-group">
                            {!! Form::label('image','แก้ไขรูปภาพหนังสือ'); !!}
                            <?= Form::file('image',null, ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">

                            <?= Form::submit('บันทึก', ['class' => 'btn btn-primary']); ?>

                        </div>

                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
             </div>
</div>    
@endsection