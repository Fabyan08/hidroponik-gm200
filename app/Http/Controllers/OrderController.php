<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 🔥 HITUNG TOTAL
            $total = 0;
            foreach ($request->cart as $item) {
                $total += $item['price'] * $item['qty'];
            }

            // ✅ INSERT KE ORDERS
            $orderId = DB::table('orders')->insertGetId([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'note' => $request->note,
                'order_date' => now(),
                'total_price' => $total,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // ✅ INSERT KE ORDER_ITEMS
            foreach ($request->cart as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $orderId 
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
