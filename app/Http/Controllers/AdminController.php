<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        if($request->isMethod('post'))
       {
                $data = $request->input(); 
                
                //return $data;

                if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>'1']))
            {
               // Session::put('AdminSession',$data['email']);
               // $email = Session::get('AdminSession');
                //return Session::get('AdminSession');

                return redirect('admin/dashboard');

            } else{
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');         
             }

        }
               
                    else
                    {
                        return view('admin.admin_login');
                    }
        
    }

    public function dashboard()
    {

        return view('admin.dashboard');

                         
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged Out Successfully');        
    }

    public function settings()
    {
     
        return view('admin.settings');

                    /*if(Session::has('AdminSession'))
                    {
                    return view('admin.settings');
                    }
                    else
                    {
                    return redirect('/admin')->with('flash_message_error','Please Login to access');  
                    }*/
        
    }

    public function check_pwd(Request $request)
    {
        $data = $request->input();  
     
        $current_password = $data['current_pwd'];

        $check_password = User::where(['email'=>Auth::user()->email])->first();



        if(Hash::check($current_password,$check_password->password)){
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }

    }

    public function update_pwd(Request $request)
    {
        if($request->isMethod('post'))
       {
            $data = $request->all();          

           $check_password = User::where(['email'=>Auth::user()->email])->first();   
            $current_password = $data['current_pwd'];         

           if(Hash::check($current_password,$check_password->password))
           {
               $password = bcrypt($data['new_pwd']);
            
               User::where('id', $check_password['id'])->update(['password'=>$password]);

               return redirect('/admin/settings')->with('flash_message_success','Password Updated');
           } else {
            return redirect('/admin/settings')->with('flash_message_error','Current password not Matched');  
           }

       }

    }



    }


