<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Traits\ZoomJWT;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Field;
use App\Models\Metting;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PharIo\Version\Exception;

class DoctorController extends Controller
{
    use ZoomJWT;
    const MEETING_TYPE_SCHEDULE = 2;

    public function show(){
        $doctors=Doctor::all(); //all doctors
        $fields=Field::select('name','id')->get();
        return view('front.doctors.doctors',get_defined_vars());
    }
    public function profile($id){
        $doctor=Doctor::findOrFail($id);
        return view('front.doctors.profile',get_defined_vars());
    }
    public function schedule($id){
        $last_weak =\Carbon\Carbon::today()->addDays(7);
        $today=\Carbon\Carbon::today();
        $time=\Carbon\Carbon::now();
        $doctor=Doctor::with(['schedules'=>function($q) use($id,$today,$last_weak){
          $q->where('status','=',0)->whereBetween('updated_at',[$today,$last_weak]);
        }])->findOrFail($id);

        return view('front.doctors.schedule',get_defined_vars());
    }

    public function get_checkout($id){
        $schedules=DoctorSchedule::findOrFail($id);

        return view('front.payment.checkout',compact(['schedules']));
    }
    public function get_Master(Request $request){
        try {
            $amount=$request->total;
            Session::put('appointment',['total'=>$request->total,
                'date'=>$request->date,
                'start_time'=>$request->start_time,
                'end_time'=>$request->end_time,
                'doctor_id'=>$request->doctor_id,
                'id'=>$request->id,
            ]);
            $ss= $this->request($amount);
            $ss = ($ss);
            if($ss->id){
                return view('front.payment.master')->with(['res'=>$ss,'request'=>$request]);
            }else{
                toast('Somthing ٍwent wrong, try again','error');
                return redirect()->back();
            }
        }catch (\Exception $ex){
            toast('Somthing ٍwent wrong, try again','error');
            return redirect()->back();
        }
    }// Payment
    public function thanks(){
        try {
            if(request('id') && request('resourcePath')){
                $payment_status = $this->getPaymentStatus(request('id'),request('resourcePath'));
                if(isset($payment_status->id)){
                    $id_payment= $payment_status->id;
                    $showSuccessPaymentMessage=true;
                    return view('front.payment.thanks',get_defined_vars())->with(['success'=>'Payment was successful']);
                }else{
                    $showFailPaymentMessage=false;
                    return view('front.payment.master')->with(['errors'=>'Fail Please Try again']);

                }
            }
            return view('front.payment.thanks');
        }catch (\Exception $e){
            toast('Somthing ٍwent wrong, try again','error');
            return redirect()->back();
        }

    }
    public function appointment(Request $request){
        try {
            DB::beginTransaction();
            $appointments=Appointment::create([
                'patient_id'=>auth('web')->user()->id,
                'doctor_id'=>$request->doctor_id,
                'start_date'=>$request->start_time,
                'end_date'=>$request->end_time,
                'id_payment'=>$request->id_payment,
            ]);

            $path = 'users/me/meetings';
            $response = $this->zoomPost($path, [
                'topic' => auth('web')->user()->name,
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($request->start_time),
                'duration' => 30,
                'agenda' => $request->date,
                'settings' => [
                    'host_video' => false,
                    'mute_upon_entry' => $request->mute_upon_entry,
                    'auto_recording' => $request->auto_recording,
                    'participant_video' => $request->participant_video,
                    'waiting_room' => true,
                ]
            ]);
            Metting::create([
                'start_time'=>$this->toZoomTimeFormat($request->start_time),
                'end_time'=>$response['start_time'],
                'join_url'=>$response['join_url'],
                'meeting_id'=>$response['id'],
                'metting_pass'=>$response['password'],
                'topic'=>$request->topic,
                'doctor_id'=>$request->doctor_id,
                'patient_id'=>auth('web')->user()->id,
            ]);
            $schedules= DoctorSchedule::findOrFail($request->id);
            $schedules->update(['status'=>1]);
            DB::Commit();
            Session::forget('appointment');
            toast('The Meeting is Created please Wait Notification To Start Meeting','success');
            return view('front.meeting');
        }catch (\Exception $e){
            DB::rollBack();
            toast('Somthing ٍwent wrong, try again','error');
            return redirect()->back();
        }

    }





    private function getPaymentStatus($id,$resourcePath){
        $url = "https://test.oppwa.com/";
        $url.=$resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        ;
        return $res = json_decode($responseData);
    }

    private function request($amount) {
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=". $amount.
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return  $res = json_decode($responseData) ;
    }
}
