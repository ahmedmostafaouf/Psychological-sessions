<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
  public function index()
  {
     $patients=Patient::all();
     return view('dashboard.patient.patients',get_defined_vars());
  }


  public function store(PatientRequest $request)
  {
    $data=$request->except(['password']);
    $data['password']=Hash::make($request->password);
    $patient=Patient::create($data);
      !$request->hasFile("patient_image")?: $patient->addMediaFromRequest('patient_image')->toMediaCollection('patient_image');
      return redirect()->route('patients.index')->with(['success'=>'Add Patient Success']);
  }//Add a patient from the dashboard


  public function update(Request $request)
  {
      $patient=Patient::findOrFail($request->id);
      if ($request->hasFile("patient_image")) {
          $patient->clearMediaCollection('patient_image');
          $patient->addMediaFromRequest('patient_image')->toMediaCollection('patient_image');
      }
      $patient->update($request->all());
      return redirect()->route('patients.index')->with(['success'=>'Update Patient Success']);
  }

  public function destroy(Request $request)
  {
   $patient=Patient::FindOrFail($request->id);
   $patient->delete();
   return redirect()->route('patients.index')->with(['success'=>'Delete Patient Success']);
  }//Delete a patient from the dashboard

}

?>
