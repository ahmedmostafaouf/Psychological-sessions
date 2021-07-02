<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorScheduleRequest;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index()
    {
        $doctors=Doctor::select('id','name')->get();
        $doctors_schedules=DoctorSchedule::all();
        return view('dashboard.doctor.schedules.schedule',get_defined_vars());
    }


    public function create()
    {
        //
    }


    public function store(DoctorScheduleRequest $request)
    {
        $myDate = $request->date;
        $date = Carbon::createFromFormat('Y-m-d', $myDate)->format('l');
        $data= $request->except(['day']);
        $data['day']=$date;
       $schedule=DoctorSchedule::create($data);

        return redirect()->route('schedules.index')->with(['success'=>'Add Schedules Success']);
    }


    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }


    public function edit(DoctorSchedule $doctorSchedule)
    {
        //
    }


    public function update(Request $request)
    {
        if($request->has('date')){
            $myDate = $request->date;
            $date = Carbon::createFromFormat('Y-m-d', $myDate)->format('l');
        }
        $doctor=Doctor::where('name',$request->doctor_id)->first()->id;
        $schedule=DoctorSchedule::findOrFail($request->id);
        $schedule->update([
            'date'=>$request->date,
            'doctor_id'=>$doctor,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'day'=>$date,
            'average_consulting_time'=>$request->average_consulting_time
        ]);
        return redirect()->route('schedules.index')->with(['success'=>'Edit Schedules Success']);
    }

    public function destroy(Request $request)
    {
        $schedule=DoctorSchedule::findOrFail($request->id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with(['success'=>'Delete Schedules Success']);
    }
    public function change_status($id){
        $schedule=DoctorSchedule::FindOrFail($id);
        $schedule->status==0 ? $schedule->update(['status'=>1]):$schedule->update(['status'=>0]);
        return redirect()->route('schedules.index')->with(['success'=>'Change Status Success']);


    }

}
