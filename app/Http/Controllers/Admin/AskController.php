<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{

  public function index()
  {
        $questions=Ask::with('answer')->get();
        return view('dashboard.questions.question',get_defined_vars());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
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

  public function destroy($id)
  {
       $questions=Ask::findOrFail($id);
      $questions->delete();
      toast('Delete Question ','success');
      return redirect()->back();
  }
    public function change_status($id){
        $questions=Ask::FindOrFail($id);
        $questions->status==0 ? $questions->update(['status'=>1]):$questions->update(['status'=>0]);
        toast('Change Status Success','success');
        return redirect()->back();


    }

}

?>
