<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email|unique:patients,email,'.$this->id,
            'password'=>'confirmed|min:6',
            'phone'=>'required',
            'dob'=>'required|date',
            'address'=>'required',
            'gender'=>'required',
        ];
    }
}
