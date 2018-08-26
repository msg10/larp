<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(request $request)
    {
                //Creating new review
                $comment = new comment;
                $comment -> body = $request -> input('body');
                $comment -> rating = $request -> input('rating');
                $comment -> user_id = auth()->user()->id;
                $comment -> item_id = $request->item;
                $comment -> save();
        
                return redirect('/items');
                //->with('success', 'Review Submitted');
        /*Comment::create([
            'body' =>request('body'),
            'rating' => request('rating'),
            'item_id' => $item->id,
        ]);
        return back();*/
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
/*
public function addComment(request $request, item $item){
    $this->validate($request,[
        'body'=>'required',
        'rating'=>'required'
        ]);
        $comment=new Comment();
        $comment->body=$request->body;
        $comment->rating=$request->rating;
        $comment->user_id=auth()->user->id;
        $item->comments()->save($comment);

}
