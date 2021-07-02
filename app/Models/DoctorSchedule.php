<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctor_schedules';
    protected $fillable=['date','start_time','day','end_time','doctor_id','status','average_consulting_time'];
    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
    public function getStatus(){
        return $this->status==1?"Complete":"Pending";
    }
    protected $dates = ['created_at', 'updated_at','start_time','end_time'];

}
