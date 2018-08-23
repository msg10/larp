@extends ('layouts.app')
@section('content')
    <h1>Items</h1>
    @if(count($items)>0)
        @foreach($items as $item)
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/items/{{$item->id}}">{{$item->title}}</a></h3>
                        <small>Created on {{$item->created_at}} by {{$item -> user -> name}} </small>
                    </div>

                </div>
            </div>
        @endforeach
        {{$items->links()}}
    @else 
        <p>No items found</p>
    @endif
@endsection