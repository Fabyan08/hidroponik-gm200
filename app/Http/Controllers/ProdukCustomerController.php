<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProdukCustomerController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('detail-produk', compact('product'));
    }
}
