<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingCustomerController extends Controller
{
    public function show($id)
    {

        $data = Training::findOrFail($id);
        $booked = TrainingRegistration::where('training_id', $id)->count();

        return view('detail-training', compact('data', 'booked'));
    }


    public function store(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $booked = TrainingRegistration::where('training_id', $id)->count();

        if ($booked >= $training->quota) {
            return back()->with('error', 'Kuota sudah penuh!');
        }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'pekerjaan' => 'required|max:255',
            'institusi' => 'nullable|max:255',
        ]);

        TrainingRegistration::create([
            'training_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pekerjaan' => $request->pekerjaan,
            'institusi' => $request->institusi,
        ]);

        return back()->with('success', 'Kamu Berhasil Daftar Pelatihan!');
    }
}
