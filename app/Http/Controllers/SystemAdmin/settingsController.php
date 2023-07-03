<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\system;
class settingsController extends Controller
{
    public function indexIcons(){
       
        $SystemIcon =  system::where('id' , 1)->value('mainLogo');
        $DashBoardIcon =  system::where('id' , 1)->value('dashBaordLogo');
        
        return view('Admins.SystemAdmin.views.Settings._icons' , compact('SystemIcon' , 'DashBoardIcon'));
    }


    public function ChangeSystemLogo(Request $request){
        

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
      
      if (!is_null($request->image)){

        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('img'), $imageName);
        system::where('id', 1)
        ->update([
            'mainLogo' => $imageName,
         ]);

      } 
 
      toast('تم تعديل البيانات بنجاح!','success');
        return back();
    }

    public function ChangeDashBoardLogo(Request $request){
        

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
      
      if (!is_null($request->image)){

        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('img'), $imageName);
        system::where('id', 1)
        ->update([
            'dashBaordLogo' => $imageName,
         ]);

      } 
 
      toast('تم تعديل البيانات بنجاح!','success');
        return back();
    }

    public function indexText(){
       
        $SystemText =  system::where('id' , 1)->value('welcomeText');
       
        return view('Admins.SystemAdmin.views.Settings._Text' , compact('SystemText'));
    }

    public function ChangeText(Request $request){
        

        $request->validate([
            'text' => 'required|max:20',

        ]);
        system::where('id', 1)
        ->update([
            'welcomeText' => $request->text,
         ]);

     
 
      toast('تم تعديل البيانات بنجاح!','success');
        return back();
    }

    
}
