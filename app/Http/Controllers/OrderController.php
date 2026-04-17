<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::withCount('items')
            ->get();
        return view('dashboard.admin.manajemen-pemesanan.index', compact('data'));
    }
    public function show($id)
    {
        $order = Order::with(['items.product'])->findOrFail($id);

        return view('dashboard.admin.manajemen-pemesanan.detail', compact('order'));
    }
    public function updateStatus(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function invoice($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        $review = Review::where('order_id', $id)->first();

        return view('dashboard.admin.manajemen-pemesanan.invoice', compact('order', 'review'));
    }
}
