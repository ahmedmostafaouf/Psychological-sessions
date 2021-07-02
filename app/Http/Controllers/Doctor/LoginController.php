<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /*public function get_login()
    {

        return view('doctor.auth.login');
    }


    public function add_login(Request $request)
    {
        $remember_me=$request->has('remember_me') ? true : false;
       if (auth()->guard('doctor')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
           if(auth('doctor')->user()->is_complete==1){
               toast('Success Login ','success');
               return redirect()->route('doctor.question');
           }else{
               toast('Success login please complete register to continue ','success');
               return redirect()->route('doctor.profile');
           }

        }
        alert()->error('Error','Email Or Password Invalid');
        return redirect()->route('doctor.login');


    }*/

    public function doctor_logout(){
       if (auth('doctor')->check()){
            auth()->guard('doctor')->logout();
        }

        toast('Success Logout ','success');
        return  redirect('/doctor/login');
    }




}
