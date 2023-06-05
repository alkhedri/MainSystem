<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        
        return view('Student._main');
    }
    public function show_currentSemSubs(Request $request)
    {

        
        return view('Student._CurrentSubjects');
    }
    public function show_EditSubjects(Request $request)
    {

        
        return view('Student._EditSubjects');
    }
    
    public function show_NotifyMenu(Request $request)
    {

        
        return view('Student._NotifyMenu');
    }

}
