<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answers';
    protected $fillable=['id','text','ask_id','doctor_id'];
    public $timestamps = true;

    public function ask()
    {
        return $this->belongsTo('App\Models\Ask', 'ask_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

}
