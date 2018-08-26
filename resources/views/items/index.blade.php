<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LARP</title>
</head>

<body>
    @extends ('layouts.app') 
    @section('content')
    <div class="container">
    <div class="card"><h1 class="text-center">@lang('lang.items')</h1> 
    @if(count($items)>0) 
    @foreach($items as $item)
    <div class="card">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
            </div>
            <div class="col-md-8 col-sm-8">
                <h3><a href="/items/{{$item->id}}">{{$item->title}}</a></h3>
                <small >@lang('lang.createdon') {{$item->created_at}} @lang('lang.createdby') {{$item -> user -> name}} </small>
                <div>@lang('lang.rating'): {{$item->rating}}</div>
            </div>

        </div>
    </div>
    @endforeach 
    {{$items->links()}} 
    @else
    <p>@lang('lang.noitems')</p>
</div>
    @endif 
    @endsection
</body>

</html>