<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Item;
use DB;

class UserController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $filter
     * @return \Illuminate\Http\Response
     */
    public function update($filter)
    {
        auth()->user()->update(['filter'=>$filter]);
        return redirect('/dashboard');

    }
}
