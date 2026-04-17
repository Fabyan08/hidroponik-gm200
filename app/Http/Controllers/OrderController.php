<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $order = Order::with('items.product')->findOrFail($id);
        return view('detail-pemesanan', compact('order'));
    }
}
