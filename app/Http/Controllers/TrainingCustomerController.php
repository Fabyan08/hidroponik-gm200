<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingCustomerController extends Controller
{
    public function show($id)
    {
        $data = Training::findOrFail($id);
        return view('detail-training', compact('data'));
    }
}
