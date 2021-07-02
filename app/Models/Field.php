<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Field extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'fields';
    protected $fillable=['name','description','short_description'];
    public $timestamps = true;

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor', 'field_id');
    }

    public function asks()
    {
        return $this->hasMany('App\Models\Ask', 'field_id');
    }

}
