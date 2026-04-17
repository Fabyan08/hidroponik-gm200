<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $data = Review::latest()->get();
        return view('dashboard.manajemen-review.index', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'tampil' => 'required|in:ya,tidak'
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'tampil' => $request->tampil
        ]);

        return back()->with('success', 'Status berhasil diubah!');
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

        $existing = Review::where('order_id', $request->order_id)->first();

        if ($existing) {

            if ($existing->created_at->diffInHours(now()) > 24) {
                return back()->with('error', 'Review tidak bisa diedit (lebih dari 24 jam)');
            }

            $existing->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'review' => $request->review,
                'rating' => $request->rating,
            ]);
        } else {

            Review::create([
                'order_id' => $request->order_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'review' => $request->review,
                'rating' => $request->rating,
                'tampil' => 'ya'
            ]);
        }

        return back()->with('success', 'Review berhasil disimpan!');
    }
}
