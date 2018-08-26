<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth() -> user();

        $items = $user->items;
        foreach ($items as $item) {
            $item->rating = $item->comments->avg('rating');
        }

        $sortedItems = $items->sortByDesc($user->filter);
        return view('dashboard') -> with('items' , $sortedItems);
    }
}
