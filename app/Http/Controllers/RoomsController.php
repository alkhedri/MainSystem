<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Instructor;
use App\Models\Department;

class RoomsController extends Controller
{
    public function add_Room(Request $request)
    {

        $user_id = auth()->user()->id;
 
        $College_id = Instructor::where('id',$user_id)->value('college_id');;
  
        Room::insert(
            [
             'name' => $request->name,
             'college_id' => $College_id,
             'department_id' => $request->departmentx
                
             ]
        );

        return \Redirect::route('Rooms');
    }


    public function Remove_Room(Request $request)
    {
 
        Room::where('id',$request->Room_id)->delete();
        return back()->with('message', 'تم حذف القاعة ');
 
    }


    public function Search_Rooms(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $departments = Department::where('college_id' , $College_id)->get();

         $RoomsList = Room::where('College_id',$College_id)->where('department_id',$request->departmentSeacrh)->paginate(5);
         

        return view('Admins.ExaminationDepartment.views.Departments.RoomsMenu' , compact('RoomsList' , 'departments'));
    }

}
