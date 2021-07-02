<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FieldRequest;
use App\Models\Field;
use Illuminate\Support\Facades\DB;

class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }
  public function index()
  {
    $fields=Field::all();
    return view('dashboard.field.index',get_defined_vars());
  }

  public function create()
  {
   return view('dashboard.field.create');
  }


  public function store(FieldRequest $request)
  {

     $fields=Field::create($request->all());
      !$request->hasFile("photo") ?: $fields->addMediaFromRequest('photo')->toMediaCollection('photo');
      return redirect()->route('fields.index')->with(['success'=>'Add Filed Success']);
  }



  public function edit(Field $field)
  {
    return view('dashboard.field.edit',get_defined_vars());
  }



  public function update(FieldRequest $request,Field $field)
  {
      if ($request->hasFile("photo")) {
          $field->clearMediaCollection('photo');
          $field->addMediaFromRequest('photo')->toMediaCollection('photo');
      }
      $field->update($request->all());
      return redirect()->route("fields.index")->with(['success'=>'Edit field Success']);
  }


  public function destroy(Field $field)
  {
      $field->delete();
      return redirect()->route("fields.index")->with(['success'=>'Delete field Success']);
  }

}

?>
