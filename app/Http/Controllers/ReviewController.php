<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('dashboard.manajemen-review.index');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'review' => 'required',
            'rating' => 'required'
        ]);

        Review::create([
            'order_id' => $request->order_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'review' => $request->review,
            'rating' => $request->rating,
            'tampil' => 'ya'
        ]);

        return back()->with('success', 'Review berhasil dikirim!');
    }
}
