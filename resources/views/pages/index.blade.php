<!doctype html>
<html>

<head>
        <meta charset="utf-8">
        <title>LARP</title>
</head>

<body>
@extends('layouts.app')

@section('content')
                <div class="jumbotron text-center">
                <h1>{{$title}}</h1>
                <p>@lang('lang.welcome') {{$title}} !</p>
                @if(Auth::guest())
                <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">@lang('lang.login')</a>
                <a class="btn btn-success btn-lg" href="/register" role="button">@lang('lang.register')</a>
                </p>
                @endif
                </div>

@endsection
        </body>
</html>