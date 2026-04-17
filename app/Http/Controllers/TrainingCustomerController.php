<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingCustomerController extends Controller
{
    public function show($id)
    {
        $data = Training::findOrFail($id);
        return view('detail-training', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();

        DB::table('training_participants')->insert([
            'training_id' => $data['training_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pekerjaan' => $data['pekerjaan'],
            'institusi' => $data['institusi'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => true]);
    }
}
