<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metting extends Model
{
 protected $guarded=[];
    protected $dates = ['created_at', 'updated_at','start_time','end_time'];
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
}
