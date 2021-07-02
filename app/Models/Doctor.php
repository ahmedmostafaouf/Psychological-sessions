<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor  extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'doctors';
    protected $fillable=['name','email','phone','session_price','password','lang','gender','main_focus','specialties','field_id','certificates','experiences','is_complete','status'];
    public $timestamps = true;

    public function Fields()
    {
        return $this->belongsTo('App\Models\Field', 'field_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'doctor_id');
    }
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'doctor_id');
    }
    public function schedules()
    {
        return $this->hasMany('App\Models\DoctorSchedule', 'doctor_id');
    }
    public function meetings()
    {
        return $this->hasMany('App\Models\Metting', 'doctor_id');
    }
    protected $casts = [
        'lang' => 'array',
    ];
    public function getGender(){
        return $this->gender==1?"Male":"Female";
    }
    public function getStatus(){
        return $this->status==1?"Active":"InActive";
    }
}
