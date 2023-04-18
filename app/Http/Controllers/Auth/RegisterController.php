<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Instructor;
use App\Models\City;
use App\Models\Department;
use App\Models\College;
use App\Models\Student;

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
   
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'guestAction']);
        $this->middleware('guest');
    }



    public function showRegistrationForm() {
     
       
        $ids = City::all('name','id');
        $departments = Department::all('arabic_name','id');
        $colleges = College::all('arabic_name','id');
    
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
            'enname' => ['required', 'string', 'min:8', ],
            'natid' => ['required', 'Numeric', 'min:8', ],
            'Badge' => ['required', 'Numeric', 'digits_between:8,12', ],
            
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
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


if ($data['user_type'] != 'student' ){
        Instructor::create([
            'id'     =>   User::select('id')->max('id'), 
            'nat_id'   =>   $data['natid'],
            'arabic_name'   =>   'Dayle',
            'english_name'   =>   $data['enname'],
            'sex'   =>   'Dayle',
            'job_id'   =>   '1',
            'city_id'   =>   '1',
            'phone'   =>   'Dayle',
            
            'department_id'   =>   '1',
            'college_id'   =>   '2',

        ]);
        $user->addRole('Instructor');
    }else{
        Student::create([
            'id'     =>   User::select('id')->max('id'), 
            'nat_id'   =>   $data['natid'],
            'Badge'   =>   $data['Badge'],
            'arabic_name'   =>   $data['name'],
            'english_name'   =>   $data['enname'],
            'sex'   =>   $data['sex'],
            'city_id'   =>   $data['city'],
            'phone'   =>   $data['phone'],
            
            'department_id'   =>   $data['department'],
            'college_id'   =>   $data['college'],

        ]);
        $user->addRole('student');
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
