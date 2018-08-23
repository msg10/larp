<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Item;
use DB;

class ItemsController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = Item::orderBy('title', 'asc')->take(1)->get();
        //$items = DB::select('SELECT * FROM items');
        //$items = Item::orderBy('title', 'asc')->get();

        $items = Item::orderBy('created_at', 'desc')->paginate(10);
        return view('items.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //Failu augshupielaade
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $fileNameWithExtension = $request -> file('cover_image') -> GetClientOriginalName();
            //Get filename,php
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Get Extension,laravel
            $extension = $request -> file('cover_image') -> getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request -> file('cover_image') -> storeAs('public/cover_images' , $fileNameToStore);
        } else {
            //ja netiek augshupielaadeets atteels, shis ir default
            $fileNameToStore = 'noimage.jpg';
        }

        //Creating new item
        $item = new Item;
        $item -> title = $request -> input('title');
        $item -> description = $request -> input('description');
        $item -> user_id = auth()->user()->id;
        $item -> cover_image = $fileNameToStore;
        $item -> save();

        return redirect('/items')->with('success', 'Item Submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        //paarbauda, vai ir atbilstoshais lietotaajs
        if(auth() -> user() -> id !== $item -> user_id){
            return redirect('/items')->with('error', 'Unauthorized Page');
        }

        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required'
        ]);

        //Failu augshupielaade
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $fileNameWithExtension = $request -> file('cover_image') -> GetClientOriginalName();
            //Get filename,php
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Get Extension,laravel
            $extension = $request -> file('cover_image') -> getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request -> file('cover_image') -> storeAs('public/cover_images' , $fileNameToStore);
        } 
        

        //Editing item
        $item = Item::find($id);
        $item -> title = $request -> input('title');
        $item -> description = $request -> input('description');
        if($request->hasFile('cover_image')){
            $item -> cover_image = $fileNameToStore;
        }
        $item -> save();

        return redirect('/items')->with('success', 'Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
                //paarbauda, vai ir atbilstoshais lietotaajs
                if(auth() -> user() -> id !== $item -> user_id){
                    return redirect('/items')->with('error', 'Unauthorized Page');
                }
        if($item->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$item->cover_image);

        }
        
        $item -> delete();
        return redirect('/items')->with('success', 'Item Deleted');

    }
}
