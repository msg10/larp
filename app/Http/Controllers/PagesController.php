<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function index(){

        $title='LARP';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data=array(
            'title'=>'Services',
            'services'=>['Web Design','Programming']
        );
        return view('pages.services')->with($data);
    }
}
