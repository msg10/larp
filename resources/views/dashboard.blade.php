@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/items/create" class="btn btn-primary">Create Post</a>
                    <h3>Your items</h3>
                    @if(count($items)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                        <td>{{$item->title}}</td>
                                        <td><a href="/items/{{$item->id}}/edit" class="btn btn-secondary">Edit</a></td>
                                        <td>    {!!Form::open(['action' => ['ItemsController@destroy', $item->id] , 'method' => 'POST', 'class'=>'float-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                </tr>
                            @endforeach
                        </table>
                        @else 
                            <p>You have no items</p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
