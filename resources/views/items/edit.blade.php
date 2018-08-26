<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LARP</title>
</head>

<body>
@extends ('layouts.app')
@section('content')
    <h1>@lang('lang.eitem')</h1>
    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', Lang::get('lang.iname'))}}
        {{Form::text('title', $item->title,['class' => 'form-control', 'placeholder' => Lang::get('lang.iname')])}}
    </div>
    <div class="form-group">
        {{Form::label('description', Lang::get('lang.idesc'))}}
        {{Form::textarea('description', $item->description,['id' => 'article-ckeditor' , 'class' => 'form-control', 'placeholder' => Lang::get('lang.idesc')])}}

    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit(Lang::get('lang.save'), ['class'=>'btn btn-secondary'])}}
    {!! Form::close() !!}
@endsection
</body>
</html>