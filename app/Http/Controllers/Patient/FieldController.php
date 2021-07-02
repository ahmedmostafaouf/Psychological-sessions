<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    public function index(){
        $fields=Field::all();
        return view('front.fields.field',get_defined_vars());
    }
    public function show($id){
        $fields=Field::select('name','id')->get();
        $field=Field::findOrFail($id);

     if($field){
         return view('front.fields.field_info',get_defined_vars());
     }
    }
    public function question($id ,Request $request){

        $validated = validator::make($request->all(),[
            'question' => 'required|string|min:5',
            'field'=>'required'

        ]);
        if ($validated->fails()) {
            return redirect()->back()->with('toast_error',$validated->messages()->all()[0])->withInput();
        }
        $field=Field::findOrFail($id);
        if(!$field){
            toast('Field Not Founded','error');
            return redirect()->back();
        }
        $questions=Ask::create([
            'text'=>$request->question,
            'patient_id'=>auth()->user()->id,
            'field_id'=>$request->field
        ]);
        toast('Well Done Question is Send','success');
        return redirect()->back();
    }
}
