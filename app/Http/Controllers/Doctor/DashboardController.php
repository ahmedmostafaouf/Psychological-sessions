<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use App\Models\Metting;
use Calendar;

class DashboardController extends Controller
{
   public function index(){
     $events = [];
        $data = Metting::Where('doctor_id',auth('doctor')->user()->id)->get();
       if($data->count()) {
           foreach ($data as $key => $value) {
               $events[] = Calendar::event(
                   $value->topic,
                   false,
                   new \DateTime($value->start_time),
                   new \DateTime($value->end_time),
                   $value->id,
                   // Add color and link on event
                   [
                       'color' => '#f05050',
                       'url' => 'pass here url and any route',
                   ]
               );
           }
       }
       $calendar = Calendar::addEvents($events);

       $questions=Ask::with('patient')->where('field_id',auth('doctor')->user()->field_id)->get();


       return view('doctor.index',get_defined_vars());
   }

    public function calendar(){


        return view('doctor.index',compact('calendar'));
    }
}
