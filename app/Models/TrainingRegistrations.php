<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingRegistrations extends Model
{
    protected $table = 'training_registrations';

    protected $fillable = [
        'training_id',
        'name',
        'email',
        'phone',
        'pekerjaan',
        'institusi',
    ];

    // 🔥 Relasi ke Training
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
