@extends ('layouts.app')
@section('content')
    <h1>New Item</h1>
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'SUBMIT' , 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Product Name')}}
        {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Product Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Product Description')}}
        {{Form::textarea('description', '',['id' => 'article-ckeditor' , 'class' => 'form-control', 'placeholder' => 'Product Description'])}}

    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::submit('Submit', ['class'=>'btn btn-secondary'])}}
    {!! Form::close() !!}
@endsection