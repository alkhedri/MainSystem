<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class typeaheadController extends Controller
{
  public function autocompleteSearch(Request $request)
  {

 
        $query = $request->get('sb');
        $filterResult = student::where('Badge', 'LIKE', '%'. $query. '%')->pluck('Badge');


      return response()->json($filterResult);

      
  } 
    public function Movement_autocompleteSearch(Request $request)
    {
 
        $query = $request->get('sb');
        // $searchBy = $request->get('search');

 
          $filterResult = student::where('Badge', 'LIKE', '%'. $query. '%')->pluck('Badge');
 
        return response()->json($filterResult);

        
    } 
    public function Renewal_autocompleteSearch(Request $request)
    {
          $query = $request->get('sb');
          $filterResult = student::where('Badge', 'LIKE', '%'. $query. '%')->pluck('Badge');
        return response()->json($filterResult);
    } 

    public function department_autocompleteSearch(Request $request)
    {
      $user_id = auth()->user()->id;

      $department_id = Instructor::where('id',$user_id)->value('department_id');
     
          $query = $request->get('sb');
          $filterResult = student::where('Badge', 'LIKE', '%'. $query. '%')->where('department_id' , $department_id)->pluck('Badge');
          return response()->json($filterResult);
    } 
}
