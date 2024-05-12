<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $store = Store::find($request->store_id);

        return view('reviews.create',compact('store'));
    }

    public function store(Request $request)
    {
         $request->validate([
             'content' => 'required'
         ]);
 
         $review = new Review();
         $review->content = $request->input('content');
         $review->store_id = $request->input('store_id');
         $review->user_id = Auth::user()->id;
         $review->save();
 
         return back();
    }
}
