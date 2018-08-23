@extends ('layouts.app')
@section('content')
    <a href="/items" class="btn btn-secondary">Go Back</a>
    <h1>{{$item->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
    <br>
    <div>
        {!!$item->description!!}
    </div>
    <hr>
    <small>Posted on {{$item->created_at}} by {{$item -> user -> name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $item -> user_id)
            <a href="/items/{{$item->id}}/edit" class= "btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['ItemsController@destroy', $item->id] , 'method' => 'POST', 'class'=>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    @endsection