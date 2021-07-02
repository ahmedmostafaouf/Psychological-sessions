<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function meeting(){
        $meetings=Metting::whereDay('start_time','=',now()->day)->WhereBetween('start_time',[Carbon::now()->subMinute(40),Carbon::now()])->get();
        $meetingsToday=Metting::whereDay('start_time','=',now()->day)->get();

        return view('dashboard.meeting.meetings',get_defined_vars());
    }
    public function all_meeting(){
        $meetings=Metting::all();
        return view('dashboard.meeting.all_meetings',get_defined_vars());
    }
    public function meetingTomorrow(){
    $meetings=Metting::whereDay('start_time','=',Carbon::tomorrow())->get();
    return view('dashboard.meeting.meetings',get_defined_vars());
}

}

?>
