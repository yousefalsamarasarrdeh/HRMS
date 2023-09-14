<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    //
    public function Show_Login_View(){
      //  $admin['name']="admin";
       // $admin['email']="1r@gmail.com";
     //   $admin['username']="admin";
     //   $admin['password']=bcrypt("admin");
     //   $admin['active']=1;
     //   $admin['date']=date("y-m-d");
      //  $admin['com_code']=1;
      //  $admin['added_by']=1;
      //  $admin['updated_by']=1;
       //  Admin::create($admin);

        return view('admin.Auth.Login');
    }
    public function login( LoginRequest $request){

        if(auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {

            return redirect()->route('admin.dashboard');

        }
        else{
            return redirect()->route('showLogin')->with(['error'=>'البيانات المدخلة غير صحيحة']);
        }


    }
    public function logout(){
        auth()->logout();
        return redirect()->route('showLogin');
    }
}
