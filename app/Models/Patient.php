<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Patient  extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'patients';
    protected $fillable=['name','email','phone','password','gender','address','dob','status'];

    public $timestamps = true;

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'patient_id');
    }

    public function asks()
    {
        return $this->hasMany('App\Models\Ask', 'patient_id');
    }

}
