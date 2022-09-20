<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function doctor_patients()
    {
        return $this->hasMany('App\Models\DoctorPatient');
    }
    public function reports()
    {
        return $this->hasMany('App\Models\PatientReport');
    }
}
