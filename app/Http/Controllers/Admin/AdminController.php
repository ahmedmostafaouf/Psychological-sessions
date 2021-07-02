<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Doctor;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  public function get_login()
  {

      return view('dashboard.auth.login');
  }


  public function add_login(AdminRequest $request)
  {
      $remember_me=$request->has('remember_me') ? true : false;
      if(auth()->guard('doctor')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {
         if(auth('doctor')->user()->is_admin==1){
             toast('Success Login ','success');
             return redirect()->route('admin.dashboard');
         }else{
             toast('Success login please complete register to continue ','success');
             return redirect()->route('doctor.profile');
         }

      }
      alert()->error('Error','Email Or Password Invalid');
      return redirect()->route('doctor.login');


  }

      public function get_register(){
      $fields=Field::select('name','id')->get();
          return view('doctor.auth.register',get_defined_vars());
      }
    public function add_register(Request $request){
        $validated = validator::make($request->all(),[
            'name' => 'required|string|min:5|max:30',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|numeric',
            'password'=>'required|string|min:6|confirmed'
        ]);
        if ($validated->fails()) {
            return redirect()->back()->with('toast_error',$validated->messages()->all()[0])->withInput();
        }
        $data=$request->except(['password']);
        $data['password']=Hash::make($request->password);
        $doctors=Doctor::create($data);
        Auth::guard('doctor')->login($doctors);
        return redirect()->route('doctor.profile');
    }


  public function admin_logout(){
      if(auth('doctor')->check()){
          auth()->guard('doctor')->logout();
      }

      toast('Success Logout ','success');
      return  redirect('admin/login');
  }

  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
