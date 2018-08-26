<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LARP</title>
</head>

<body>
    @extends ('layouts.app')
@section('content')
    <a href="/items" class="btn btn-secondary">@lang('lang.goback')</a>
    <div class="text-center">
    <h1>{{$item->title}}</h1>
    <img style="width:50% " src="/storage/cover_images/{{$item->cover_image}}">
    </div>
    <br>
    <div>
        {!!$item->description!!}
    </div>
    <hr>
    <small>@lang('lang.createdon') {{$item->created_at}} @lang('lang.createdby') {{$item -> user -> name}} </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $item -> user_id)
            <a href="/items/{{$item->id}}/edit" class= "btn btn-secondary">@lang('lang.edit')</a>

            {!!Form::open(['action' => ['ItemsController@destroy', $item->id] , 'method' => 'POST', 'class'=>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit(Lang::get('lang.delete'), ['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <hr>
    {{--Rating/reviews--}}
    <div class="comments">
        <ul class="list-group">
        @foreach($item->comments as $comment)
        <li class="list-group-item">

            <div class="d-inline-block float-left">{{$comment->created_at}}: &nbsp;</div>
            {{--<div class="d-inline-block float-left">{{$comment->created_at->diffForHumans()}}: &nbsp;</div>--}}
            <br>
            <div class="d-inline-block">{{$comment->body}} </div>
            <div class="d-inline-block float-right"><p>@lang('lang.rating'): {{$comment->rating}}</p></div>

        </li>
        @endforeach
    </ul>
    </div>
    {{--Add a review--}}
    <hr>
    <div class="card">
        <div class="card-block">
        <form method="POST" action="/items/{{$item->id}}/comments">
            {{csrf_field()}}
            <p>@lang('lang.rating')</p>

            <div class="form-group">
                    <select name="rating" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="body" placeholder="@lang('lang.review')" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                </div>
            </form>
        </div>


    @endsection
    </body>
    </html>