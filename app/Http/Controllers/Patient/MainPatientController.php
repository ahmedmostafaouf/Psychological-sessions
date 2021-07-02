<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use App\Models\Doctor;
use App\Models\Metting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class MainPatientController extends Controller
{

    public function get_home(){
        $doctors=Doctor::all();
        return view('front.home',get_defined_vars());
    }
    public function ask_answer(){
        try {
            $asks=Ask::with('answer')->where('patient_id',auth('web')->user()->id)->get();
            return view('front.patients.ask_answer',get_defined_vars());

        }catch (\Exception $ex ){
            toast('Something ٍwent wrong, try again','error');
            return redirect()->back();
        }
    }
    public function meeting()
    {
        try {
            $meetings=Metting::whereDay('start_time','=',now()->day)
                ->WhereBetween('start_time',[Carbon::now()->subMinute(40),Carbon::now()])
                ->where('patient_id',auth('web')->user()->id)
                ->get();
            $meetingsTomorrow=Metting::whereDay('start_time','=',Carbon::tomorrow())
                ->where('patient_id',auth('web')
                ->user()->id)->get();
            $meetingsToday=Metting::whereDay('start_time','=',now()->day)
                ->where('patient_id',auth('web')
                ->user()->id)->get();
            return view('front.patients.meeting',get_defined_vars());
        }catch (\Exception $ex){
            toast('Something ٍwent wrong, try again','error');
            return redirect()->back();
        }
    }//Meeting Patient
}
