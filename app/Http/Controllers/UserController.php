<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or Password is invalid";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    public function register(){
        return view('register');
    }
    public function save(Request $request){
        $gender=substr(trim($request->input('gender')),0,10);
       DB::table('registers')->insert([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'Gender'=>$gender,
        'dob'=>$request->input('dob'),
       ]);
       return redirect('/')->with('status','registered successfully');
    //    $register=new Register();
    //    $register->name=$request->input('name');
    //    $register->email=$request->input('email');
    //    $register->password=bcrypt($request->input('password'));
    //    $register->Gender=$request->input('gender');
    //    $register->dob=$request->input('dob');
    //    $register->save();
    }
}
