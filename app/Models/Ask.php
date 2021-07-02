<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ask extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'asks';
    protected $fillable=['id','text','field_id','patient_id','status'];
    public $timestamps = true;
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }
    public function answer()
    {
        return $this->hasOne('App\Models\Answer', 'ask_id');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id');
    }
    public function getStatus(){
        return $this->status==1?"Answer":"NoAnswer";
    }

}
