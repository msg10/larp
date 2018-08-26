<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LARP</title>
</head>

<body>
    @extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header text-center"><h1>@lang('lang.dashboard')</h1></div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <div class="row justify-content-md-center">
                   <a href="/items/create" class="btn btn-primary">@lang('lang.createitem')</a>
                </div>
                <br>
                <br>
               <h3 class="text-center">@lang('lang.youritems')</h3>
               <br>
               <br>
               @if(count($items)>0)

               <div class="d-inline-block float-right">
                    <h6 class="d-inline-block">@lang('lang.displayitems') : </h6>

                   <div class="d-inline-block">
               {!! Form::open(['action' => ['UserController@update', "created_at"], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
               {{Form::hidden('_method', 'PUT')}}
               {{Form::submit(Lang::get('lang.bydate'), ['class'=> 'btn'])}}
               {!!Form::close()!!}
                   </div>

                   <div class="d-inline-block">
               {!! Form::open(['action' => ['UserController@update', "rating"], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
               {{Form::hidden('_method', 'PUT')}}
               {{Form::submit(Lang::get('lang.byrating'), ['class'=> 'btn'])}}
               {!!Form::close()!!}
                   </div>
               </div>
               <br>
               <br>
               <table class="table table-striped">
                  <tr>
                     <th>@lang('lang.iname')</th>
                     <th></th>
                     <th></th>
                  </tr>
                  @foreach($items as $item)
                  <tr>
                     <td><a href="/items/{{$item->id}}/edit">{{$item->title}}</a></td>
                     <td>
                        <a href="/items/{{$item->id}}/edit" class="btn btn-secondary">@lang('lang.edit')</a>
                     </td>
                      <td>
                          {!!Form::open(['action' => ['ItemsController@destroy', $item->id] , 'method' => 'POST', 'class'=>'float-right'])!!}
                          {{Form::hidden('_method', 'DELETE')}}
                          {{Form::submit(Lang::get('lang.delete'), ['class'=> 'btn btn-danger'])}}
                          {!!Form::close()!!}
                      </td>
                      <td>
                          {{$item->rating}}
                      </td>
                  </tr>
                  @endforeach
               </table>
               @else 
               <p class="text-center">@lang('lang.noitems')</p>
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
</body>
</html>