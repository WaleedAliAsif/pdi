<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReport extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}
