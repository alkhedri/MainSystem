<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Instructor;
use App\Models\city;
use App\Models\department;
use App\Models\college;
use App\Models\student;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        if ($this->guard()->user()->hasRole('instructor')) {
            return '/inst';
        }
        else if ($this->guard()->user()->hasRole('college')) {
            return '/test';
        }   else if ($this->guard()->user()->hasRole('student')) {
           
        }

        return '/test';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest', ['only' => 'guestAction']);
       // $this->middleware('guest');
    }



    public function showRegistrationForm() {
     
       
        $ids = city::all('name','id');
        $departments = department::all('arabic_name','id');
        $colleges = college::all('arabic_name','id');
    
        return view ('auth.register',  compact('ids' , 'departments' , 'colleges'));
 

       
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['user_type'] == 'instructor' ){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'enname' => ['required', 'string', 'min:8', ],
            'natid' => ['required', 'digits:10', ],
          
        ]); 
    }elseif($data['user_type'] == 'student' ){

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
  
            
        ]); 

    }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
   
        // if ($validator->fails()) {
        //     return view('view_name');
        // } else {
        //     return view('view_name');
        // }

if ($data['user_type'] != 'student' ){
    $user =  User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

        Instructor::create([
            'id'     =>   User::select('id')->max('id'), 
            'nat_id'   =>   $data['natid'],
            'arabic_name'   =>   $data['name'],
            'english_name'   =>   $data['enname'],
            'sex'   =>   $data['sex'],
            'job_id'   =>   '111111',
            'city_id'   =>   $data['city'],
            'phone'   =>   $data['phone'],
            
            'department_id'   =>   $data['department'],
            'college_id'   =>   $data['college'],

        ]);

        $user->addRole('Instructor');
    }else{
        // $user =  User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        // $user->addRole('student');
        // Student::create([
        //     'id'     =>   User::select('id')->max('id'), 
        //     'nat_id'   =>   $data['natid'],
        //     'Badge'   =>   $data['Badge'],
        //     'arabic_name'   =>   $data['name'],
        //     'english_name'   =>   $data['enname'],
        //     'sex'   =>   $data['sex'],
        //     'city_id'   =>   $data['city'],
        //     'phone'   =>   $data['phone'],
        //     'department_id'   =>   $data['department'],
        //     'college_id'   =>   $data['college'],
        //     'units'   =>   0,
        //     'gpa'   =>   0,
        //     'enrollment_status_id'   =>   3,
        //     'birth'   =>    $data['birth'],
        //     'enrollment_date'   =>    $data['Enrollment'],
            
            

        // ]);
       
    }

    //    $user_id = User::select('id')->max('id');
    //     Instructor::insert(
    //         array(
    //                'id'     =>   $user_id, 
    //                'nat_id'   =>   '1',
    //                'arabic_name'   =>   'Dayle',
    //                'english_name'   =>   'Dayle',
    //                'sex'   =>   'Dayle',
    //                'job_id'   =>   '1',
    //                'city_id'   =>   '1',
    //                'phone'   =>   'Dayle',
                    
    //                'department_id'   =>   '1',
    //                'college_id'   =>   '2',
                   

    //         )
    //    );

       return $user;
 

    }
}
