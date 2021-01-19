<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB,Session,Hash;


class User extends Model
{
   static public function validate($request){
    $valid = false;
    $email = $request['email'];
    $password = $request['password'];
    $sql = "SELECT * FROM users u JOIN user_roles r ON u.id = r.uid WHERE u.email = ?";
    $user = DB::select($sql,[$email]);

    if($user){
        $user = $user[0];
        if(Hash::check($password,$user->password)){
            $valid = true;

            //only for admin users
            if($user->role == 6){
                Session::put('is_admin',true);
            }

            //for all users
            Session::put('user_id',$user->id);
            Session::put('user_name',$user->name);
            Session::flash('sm',$user->name.' Welcome Back');
        }
    }
    return $valid;
   }



   static public function saveNew($request){
       $user = new self();
       $user->name = $request['name'];
       $user->email = $request['email'];
       $user->password = bcrypt($request['password']);

       $user->save();

       $uid = $user->id;

       DB::insert("INSERT INTO user_roles VALUES ($uid,7)");

       //after register commit sign in to web
       Session::put('user_id',$uid);
       Session::put('user_name',$request['name']);
       Session::flash('sm',$request['name'].' Your account created, you are logged in');

   }
}
