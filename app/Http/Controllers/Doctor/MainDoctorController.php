<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorRequest;
use App\Http\Requests\Admin\DoctorScheduleRequest;
use App\Http\Traits\ZoomJWT;
use App\Models\Answer;
use App\Models\Appointment;
use App\Models\Ask;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Field;
use App\Models\Metting;
use Carbon\Carbon;
use Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainDoctorController extends Controller
{
    use ZoomJWT;
    public function __construct()
    {
        $this->middleware('is_doctor');
        $this->middleware('is_complete')->except(['get_profile','edit_profile']);
    }
    public function index()
    {

        $doctors_schedules=DoctorSchedule::where('doctor_id',auth('doctor')->user()->id)->get();
        return view('doctor.schedules.schedule',get_defined_vars());
    }
    public function get_schedule_day()
    {

        $doctors_schedules=DoctorSchedule::where('doctor_id',auth('doctor')->user()->id)->whereDate('date',Carbon::today())->get();
        return view('doctor.schedules.schedule',get_defined_vars());
    }
    public function get_schedule_weak()
    {
         $last_weak =Carbon::today()->subDays(7);
         $today=Carbon::today();
         $doctors_schedules=DoctorSchedule::where('doctor_id',auth('doctor')->user()->id)->WhereBetween('date',[$last_weak,$today])->get();
        return view('doctor.schedules.schedule',get_defined_vars());
    }
    public function get_schedule_after_week()
    {
        $date = Carbon::today()->addDays(7);
        $doctors_schedules=DoctorSchedule::where('doctor_id',auth('doctor')->user()->id)->where('date','>=',$date)->get();
        return view('doctor.schedules.schedule',get_defined_vars());
    }






    public function store(DoctorScheduleRequest $request)
    {
        $myDate = $request->date;
        $start_time=$this->toZoomTimeFormat($request->start_time);
        $end_time=$this->toZoomTimeFormat($request->end_time);
        $date = Carbon::createFromFormat('Y-m-d', $myDate)->format('l');
        $data= $request->except(['day','start_time']);
        $data['day']=$date;
        $data['start_time']=$start_time;
        $data['end_time']=$end_time;
        $schedule=DoctorSchedule::create($data);
        return redirect()->route('schedule.index')->with(['success'=>'Add Schedules Success']);
    }


    public function get_profile()
    {
        $fields=Field::select('name','id')->get();
       return view('doctor.profile.show',get_defined_vars());
    }
    public function edit_profile(DoctorRequest $request){
        if ($request->hasFile("doctor_image")) {
            auth('doctor')->user()->clearMediaCollection('doctor_image');
            auth('doctor')->user()->addMediaFromRequest('doctor_image')->toMediaCollection('doctor_image');
        }

        if ($request->hasFile("cv")) {
            auth('doctor')->user()->clearMediaCollection('cv');
            auth('doctor')->user()->addMediaFromRequest('cv')->toMediaCollection('cv');
        }
        auth('doctor')->user()->update($request->all());
        return redirect()->route('doctor.profile')->with(['success'=>'Update Doctor Success']);
    }



    public function get_forget()
    {
        return view('doctor.auth.forget_password',get_defined_vars());
    }
    public function change_password(Request $request){

            if(!(Hash::check($request->get('old_password'),auth('doctor')->user()->password))){
                toast('The old Password IS Wrong','error');
                return redirect()->route('doctor.forget.password');
            }
            if(strcmp($request->get('old_password'),$request->get('password'))==0){
                toast('The old Password Equal New Password','error');
                return redirect()->route('doctor.forget.password');
            }
            $validatedData = $request->validate([
                'old_password' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user=auth('doctor')->user();
            $request_data=$request->except(['password']);
            $request_data['password']=Hash::make($request->password);
            $user->update($request_data);
        toast('The Password Updated','success');
        return redirect()->route('doctor.forget.password');
    }


    public function update(Request $request, $id)
    {

        if($request->has('date')){
            $myDate = $request->date;
            $date = Carbon::createFromFormat('Y-m-d', $myDate)->format('l');
        }
       $schedule=DoctorSchedule::findOrFail($request->id);
        $schedule->update([
            'date'=>$request->date,
            'doctor_id'=>$request->doctor_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'day'=>$date,
            'average_consulting_time'=>$request->average_consulting_time
        ]);
        return redirect()->route('schedule.index')->with(['success'=>'Edit Schedule Success']);
    }


    public function destroy(Request $request)
    {
        $schedule=DoctorSchedule::findOrFail($request->id);
        $schedule->delete();
        return redirect()->route('schedule.index')->with(['success'=>'Delete Schedules Success']);
    }
    public function get_answerAndQuestions(){
        $asks=Ask::where('field_id',auth('doctor')->user()->field_id)->where('status',0)->get();
        $answers=Answer::where('doctor_id',auth('doctor')->user()->id)->with('ask')->get();

        return view('doctor.question.questions',get_defined_vars());
    }
    public function answer(Request $request){
        $asks=Ask::findOrFail($request->id);
        $answer=Answer::create([
           'ask_id'=>$request->id,
           'text'=>$request->answer,
           'doctor_id'=>auth('doctor')->user()->id,
        ]);
        $asks->update(['status'=>1]);
        return redirect()->route('doctor.question')->with(['success'=>'Answer Question Success']);
    }
    public function meeting(){
        $meetings=Metting::whereDay('start_time','=',now()->day)->WhereBetween('start_time',[Carbon::now()->subMinute(40),Carbon::now()])->where('doctor_id',auth('doctor')->user()->id)->get();
        $meetingsToday=Metting::whereDay('start_time','=',now()->day)->where('doctor_id',auth('doctor')->user()->id)->get();

        return view('doctor.meeting.meetings',get_defined_vars());
    }public function meetingTomorrow(){
        $meetings=Metting::whereDay('start_time','=',Carbon::tomorrow())->where('doctor_id',auth('doctor')->user()->id)->get();
        return view('doctor.meeting.meetings',get_defined_vars());
    }

    public function fullcalendar(){

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
        return view('doctor.calendar', compact('calendar'));


    }

    public function SchedulerCalendar(){

        $events = [];
        $data = DoctorSchedule::Where('doctor_id',auth('doctor')->user()->id)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    'Scheduler : ' .$value->doctor->name,
                    false,
                    new \DateTime($value->start_time),
                    new \DateTime($value->end_time),
                    $value->id,
                    // Add color and link on event
                    [
                        'color' => '#3d84b8',
                        'url' => url('doctor/doctors/schedule'),
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('doctor.schedules.calendar_schedules', compact('calendar'));


    }
}
