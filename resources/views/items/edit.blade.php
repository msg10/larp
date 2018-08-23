@extends ('layouts.app')
@section('content')
    <h1>Edit Item</h1>
    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'SUBMIT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Product Name')}}
        {{Form::text('title', $item->title,['class' => 'form-control', 'placeholder' => 'Product Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Product Description')}}
        {{Form::textarea('description', $item->description,['id' => 'article-ckeditor' , 'class' => 'form-control', 'placeholder' => 'Product Description'])}}

    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-secondary'])}}
    {!! Form::close() !!}
@endsection