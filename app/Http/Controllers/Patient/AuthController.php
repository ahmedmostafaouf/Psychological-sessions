<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function get_patient_login(){
        return view('front.auth.login');

    }
    public function add_patient_login(Request $request){
            if(auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {
                toast('Success Login ','success');
                return redirect()->route('patient.home');
            }
            alert()->error('Error','Email Or Password Invalid');
            return redirect()->route('patient.login');
    }//End Patient Login
    public function register(){
        return view('front.auth.register');
    }
    public function add_patient(Request $request){
        $validated = validator::make($request->all(),[
            'name' => 'required|string|min:5|max:30',
            'email'=>'required|email|unique:patients,email',
            'phone'=>'required|numeric',
            'password'=>'required|string|min:6|confirmed'
        ]);
        if ($validated->fails()) {
            return redirect()->back()->with('toast_error',$validated->messages()->all()[0])->withInput();
        }
        $data=$request->except(['password']);
        $data['password']=Hash::make($request->password);
        $patients=Patient::create($data);
        Auth::login($patients);
        return redirect()->route('patient.home');
    }

    public function logout_patient(){
        if(auth()->check()){
            auth()->logout();
        }
        toast('Success Logout ','success');
        return redirect()->route('patient.home');
    }
}
