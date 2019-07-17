<?php

namespace App\Http\Controllers\public_users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\public_users;

class IndexController extends Controller
{
    //login view
    public function login(){
        return view('public_voting.login');
    }
    //new public user registration
    public function register(){
        return view('public_voting.register');
    }
    //new public user registration
    public function dashboard(){
        return view('public_voting.dashboard');
    }
    //login post controller
    public function logme(Request $request){

        try{
            $checks=public_users::where('email',$request->u_name)->orWhere('phone',$request->u_name)->get();

            if(count($checks)>0){
                foreach ($checks as $check){
                    session()->put([
                        'public_name'=>$check->name,
                        'public_email'=>$check->email,
                        'public_phone'=>$check->phone,
                    ]);
                }//foreach end
                session()->flash('success_msg','Successfully logged in as '.$check->name);
                return redirect('/public');
            }
            else{
                session()->flash('err_msg','Invalid email or phone');
                return redirect('/public/login');
            }
        }
        catch (\Exception $exception){
            session()->flash('err_msg','Something went worng contact admin');
            return redirect('/public/login');
        }
    }
    //logout control
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/public/login');
    }
    //store user from new registration
    public function store(Request $request){
        if(isset($request->updateid)){
            $data=public_users::find($request->updateid);
        }
        else{
            $data=new public_users();
        }
        $data->name=$request->u_name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->location=$request->location;
        $data->status=1;

        $this->validate($request,[
            'u_name' => 'required',
            'email' => 'unique:public_users,email',
            'phone' => ['unique:public_users,phone',],
            'location' => 'required',
        ]);
        try{
            $data->save();
            session()->flash('success_msg','Successfully Registered !');
            return redirect('/public/login');
        }
        catch(\Exception $exception){
            session()->flash('err_msg','Something went worng !');
            return redirect('/public/register');
        }
    }

}
