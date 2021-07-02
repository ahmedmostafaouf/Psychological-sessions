<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorRequest;
use App\Models\Doctor;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

  public function index()
  {
     $doctors =Doctor::all();

     return view('dashboard.doctor.index',get_defined_vars());
  }


  public function create()
  {
      $fields=Field::select('id','name')->get();
      return view('dashboard.doctor.create',get_defined_vars());
  }


  public function store(DoctorRequest $request)
  {
    $data=$request->except(['password']);
    $data['password']=Hash::make($request->password);
    $doctor=Doctor::create($data);
      !$request->hasFile("doctor_image") ?: $doctor->addMediaFromRequest('doctor_image')->toMediaCollection('doctor_image');
      !$request->hasFile("cv") ?: $doctor->addMediaFromRequest('cv')->toMediaCollection('cv');

      return redirect()->route('doctors.index')->with(['success'=>'Add Doctor Success']);
  }


  public function show(Doctor $doctor)
  {
    return view('dashboard.doctor.show',get_defined_vars());
  }


  public function edit(Doctor $doctor)
  {
      $fields=Field::select('id','name')->get();
   return view('dashboard.doctor.edit',get_defined_vars());
  }


  public function update(DoctorRequest $request,Doctor $doctor)
  {
      if ($request->hasFile("doctor_image")) {
          $doctor->clearMediaCollection('doctor_image');
          $doctor->addMediaFromRequest('doctor_image')->toMediaCollection('doctor_image');
      }

      if ($request->hasFile("cv")) {
          $doctor->clearMediaCollection('cv');
          $doctor->addMediaFromRequest('cv')->toMediaCollection('cv');
      }
      $doctor->update($request->all());
      return redirect()->route('doctors.index')->with(['success'=>'Update Doctor Success']);


  }
  public function change_status($id){
      $doctors=Doctor::FindOrFail($id);
      $doctors->status==0 ? $doctors->update(['status'=>1]):$doctors->update(['status'=>0]);
      return redirect()->route('doctors.index')->with(['success'=>'Change Status Success']);


  }


  public function destroy(Doctor $doctor)
  {
      $doctor->delete();
      return redirect()->route('doctors.index')->with(['success'=>'Delete Doctor Success']);

  }

}

?>
