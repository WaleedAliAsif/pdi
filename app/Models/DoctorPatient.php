<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'patient_id'];
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}
