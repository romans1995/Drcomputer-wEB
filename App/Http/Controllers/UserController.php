<?php

namespace App\Http\Controllers;
use App\Http\Requests\ SigninRequest;
use App\Http\Requests\ SignupRequest;
use App\User;
use Session;

class UserController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->middleware('signguard',['except'=>'logout']);
    }
    public function signin()
    {
        
        self::$data['page_title']='sign in page';
        return view ('forms.signin',self::$data);
    }
    public function signup(){
        self::$data['page_title'] = 'sign up page';
        self::$data['city'] = User::getCity()->toArray();
        return view('forms.signup',self::$data);
    }
    public function postSignin(SigninRequest $request)
    {
        $to = !empty($request['to']) ? $request['to']:'';

       if( User::verify($request['email'], $request['password'])){
       
           return redirect($to);

    } else {

           self::$data['page_title'] ='sign in page';
           self::$data['verify_error'] = 'אימייל או סיסמה לא נכונים';
           return view('forms.signin',self::$data);
       }
    }
       public function postSignup(SignupRequest $request)
       {
           
           User::save_new($request);
           return redirect('');



       }
    
    public function logout(){
    Session::flush();
    return redirect('user/signin');
    }
}