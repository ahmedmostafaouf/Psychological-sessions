<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $table = 'appointments';
    protected $guarded=[];
    public $timestamps = true;

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }

}
