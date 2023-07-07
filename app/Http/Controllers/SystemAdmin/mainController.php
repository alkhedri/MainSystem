<?php

namespace App\Http\Controllers\SystemAdmin;
use App\Models\User;
use App\Models\college;
use App\Models\Instructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Laratrust\Models\Permission;
class mainController extends Controller
{
    public function index()
    {
        return view('Admins.SystemAdmin.views._main');
    }

    public function CollegesMenu()
    {
        $user_id = auth()->user()->id;
        $Colleges = college::all();
        return view('Admins.SystemAdmin.views.Colleges._menu' ,  compact( 'Colleges'));
    }

    public function CollegeInfo(request $request)
    {

        $instructors = Instructor::where('college_id' , $request->id)->get();
        $dean = 0;
        foreach($instructors as $instructor){
         $user = User::find($instructor->id);
         if(!is_null($user) && $user->isAbleTo('dean-read'))
             $dean = $instructor->id;
     }

        $college = college::where('id' , $request->id)->get();
        $staff = Instructor::where('college_id' , $request->id)->get();
        $college_id = $request->id;
        return view('Admins.SystemAdmin.views.Colleges._info' ,  compact( 'dean' , 'college_id' , 'college' , 'staff'));
    }
    public function Update_CollegeInfo(Request $request)
    {

 

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'english_name' => 'required',
            'arabic_name' => 'required',

        ]);
      
      if (!is_null($request->image)){
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(storage_path('app/public/colleges/'), $imageName);
        college::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
            'icon' => $imageName,
         ]);
      }else {
        college::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
         ]);
      }
 
      toast('تم تعديل البيانات بنجاح!','success');
        return back();
    }
    public function CollegeDean(request $request)
    {
        $instructors = Instructor::where('college_id' , $request->id)->get();
        $dean = 0;
     foreach($instructors as $instructor){
         $user = User::find($instructor->id);
         if(!is_null($user) && $user->isAbleTo('dean-read'))
             $dean = $instructor->id;
     }

        $college_id = college::where('id' , $request->id)->value('id');
        $staff = Instructor::where('college_id' , $request->id)->paginate(5);
            if($college_id != $request->id)
            abort(404);
        return view('Admins.SystemAdmin.views.Colleges._DeanEdit' ,  compact( 'dean' , 'college_id' , 'staff'));
    }

    public function serach_CollegeDean(Request $request)
    {
        $instructors = Instructor::where('college_id' , $request->id)->get();
           $dean = 0;
        foreach($instructors as $instructor){
            $user = User::find($instructor->id);
            if(!is_null($user) && $user->isAbleTo('dean-read'))
            
            $dean = $instructor->id;
        }


        $college_id = college::where('id' , $request->id)->value('id');
        $staff = Instructor::where('college_id' , $request->id)->where('arabic_name', 'like', '%' . $request->name . '%')->paginate(5);
            if($college_id != $request->id)
            abort(404);
         return view('Admins.SystemAdmin.views.Colleges._DeanEdit' ,  compact( 'dean'  ,'college_id' , 'staff'));
    }

    public function set_CollegeDean(Request $request)
    {
            //   TAKE HOD PERMISSIONS
            $instructors = Instructor::where('college_id' , $request->college_id)->get();
           
            foreach($instructors as $instructor){
                $user = User::find($instructor->id);
                if(!is_null($user) && $user->isAbleTo('dean-read'))
                $user->removePermission('dean-read');
            }

  
            //   GIVE DEAN PERMISSIONS
            $user = User::find($request->dean);
             if(!is_null($user)){
                $user->givePermission('dean-read');
                toast('تم تعديل البيانات بنجاح!','success');
             }
             
        
        return back();
    }

    public function New_College()
    {
        return view('Admins.SystemAdmin.views.Colleges._NewCollege');
    }
    public function NewCollegeActionAdd(Request $request)
    {

        $request->validate([
            'arabic_name' => 'required',
            'english_name' => 'required',
        ]);
        college::insert(
            [
             'arabic_name' => $request->arabic_name,
             'english_name' =>$request->english_name,  
             ]
        );

        return \Redirect::route('CollegesMenu');
    }


    public function CollegeDelete()
    {

        $Colleges = college::all();
 
            
        $title = 'حذف كلية ';
        $text = "هل أنت متأكد من حذ هذه اللية ؟";
        confirmDelete($title, $text);
        return view('Admins.SystemAdmin.views.Colleges._Delete',  compact( 'Colleges'));
    
    }
    public function delete_College(Request $request){
        college::where('id',$request->id)->delete();
        toast('تم حذف الكلية بنجاح!','danger');
        return back();
        
    }
}
