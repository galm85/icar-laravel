<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController
{

    function __construct()
    {
        parent::__construct();
        $this->middleware('signmid',['except'=>['logout']]);
    }

    public function getSignin(){
        self::$data['title'] .= 'sign in page';

         return view('forms.signin',self::$data);
    }


    //needs to use to the namespace
    //this create validation
    public function postSignin(SigninRequest $request){

        $rt = !empty($request['rt'])? $request['rt'] : '';

        if(User::validate($request)){
           return  redirect($rt);
        }else{
            self::$data['title'] .= 'Sign in Page';
            return view('forms.signin',self::$data)->withErrors('Wrong Email or Password');
        }
    }

    public function getSignup(){
        self::$data['title'] .= 'Sign up';
        return view('forms.signup',self::$data);
    }

    public function postSignup(SignupRequest $request){
        User::saveNew($request);
        return redirect('');

    }

    public function logout(){
        Session::flush();
        return redirect('user/signin');
    }



}
