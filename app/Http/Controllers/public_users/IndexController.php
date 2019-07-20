<?php

namespace App\Http\Controllers\public_users;

use App\Mail\PublicMailVerification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\public_users;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Str;

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
        $times=array(1,2,3,4,5,6,7,8);
        return view('public_voting.dashboard')->with('times',$times);
    }

    //logout control
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/public/login');
    }

    //login post controller
    public function logme(Request $request){

        try{
            $checks=public_users::where('email',$request->u_name)->orWhere('phone',$request->u_name)->get();
            foreach ($checks as $check){
                $name=$check->name;
                $email=$check->email;
                $phone=$check->phone;
                $status=$check->status;
            }//foreach end
            if(count($checks)>0){
                if ($status==1){
                    session()->put([
                        'public_name'=>$name,
                        'public_email'=>$email,
                        'public_phone'=>$phone,
                    ]);
                    session()->flash('success_msg','Successfully logged in as '.$check->name);
                    return redirect('/public');
                }
                else{
                    session()->put([
                        'tmp_EM'=>$request->u_name,
                    ]);
                    session()->flash('err_msg','Activate your modellz account using either email or phone');
                    return redirect('/public/verify');
                }
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

    //store user from new registration
    public function store(Request $request){
        $rules =[
            'u_name' => 'required',
            'email' => 'unique:public_users,email',
            'phone' => ['unique:public_users,phone',],
            'location' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field can not be blank.',
             'unique' => 'The :attribute is already exists.'
        ];

        $this->validate($request, $rules, $customMessages);

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
        $data->num_of_sends=1;
        $data->status=0;
        $rand = rand(10000,99999);
        $data->sms_code = $rand;
        $data->token=Str::random(32);
        session()->put([
            'tmp_EM'=>$request->email
        ]);
        $smsContent = "Hi $request->u_name,Use this code to activate your account.$rand";

        try{
            $data->num_of_sends=2;
            $data->save();
            $this->SendActiveMail($data);
            $this->SendActiveSms($data,$smsContent);
            //session()->flash('success_msg','Successfully Registered !');
            echo '<div class="col-md-5 col-lg-5 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
           <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Congratulations! your account is registered, you will shortly receive an email to activate your account.
            </div>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="/public/register/otp" autocomplete="off">                
                        <div class="form-group">
                            <label for="u_name" class="control-label pull-left" style="padding-right: 25px;">Enter OTP to verify mobile number :</label>
                            <input  type="text" class="form-control" id="IdPublicOtp" name="otp" required autofocus >
                            <input  type="hidden" class="form-control" id="IdPublicToken" name="_token" value="'.csrf_token().'">
                        </div>
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit" id="IdOtpSubmit" class="btn btn-primary" style="display: inline;">Submit</button>
                                <a class="btn btn-link" href="#" id="IdPublicResend" style="font-size: 14px;display: inline;">
                                    Resend OTP!
                                </a><br/>
                            </div>
                        </div><br/></form></div></div></div>';
        }
        catch(\Exception $exception){
            echo '<div class="col-md-5 col-lg-5 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
           <div class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Something went wrong!.
            </div>';
        }
    }

    //mail link activation for public users
    public function activate($name,$token)
    {
        $user = public_users::where(['token'=> $token,'name'=>$name,'status'=>0])->first();
        $this->notification_lock($user->num_of_sends);
        if (empty($user)) {
            session()->flash('err_msg','Your activation code is either expired or invalid, login here to re-validate.');
            return redirect()->to('/public/login');
        }
        else{
            $user->status=1;
            $user->token=null;
            $user->update();
            session()->flash('success_msg','Congratulations! your account is now activated.');
            return redirect()->to('/public/login');
        }
    }

    //sms otp verification for public users
    public function verifyOtp(Request $request)
    {
        $user = public_users::where('email', session('tmp_EM'))->orWhere('phone',session('tmp_EM'))->first();
        if (empty($user)) {
            session()->flash('err_msg','Your activation link is either expired or invalid, login here to re-validate.');
            return redirect()->to('/public/login');
        }elseif ($user->sms_code!=$request->otp) {
            session()->flash('success_msg','Congratulations! your account is now activated.');
            return redirect()->to('/public/login');
        }
        $user->update(['sms_code' => null, 'status' => 1]);
        session()->flash('success_msg','Congratulations! your account is now activated.');
        return redirect()->to('/public/login');
    }

    //Activation Page
    public function verify(){
        if(!session('tmp_EM')){
            session()->flash('err_msg','Enter your email / Phone before verifying your account');
            return redirect()->to('/public/login');
        }
       return view('public_voting.activation');
    }

    //send mail activation link
    public function SendActiveMail($data,$id=null){
        if($id!=null){
            $add=public_users::find($id);
            $add->num_of_sends+=1;
            $add->save();
        }
        $mailables=new PublicMailVerification($data['token'],$data['name'],$data['email'],$data['phone'],$data['otp']);
         Mail::to($data['email'])->send($mailables);
    }

    //Send sms otp for activation
    public function SendActiveSms($data,$smsContent,$id=null){
        if($id!=null){
            $add=public_users::find($id);
            $add->num_of_sends+=1;
            $add->save();
        }
        Curl::to('http://bulksms.expressad.in/httpapi/httpapi')
            ->withData( array( 'token' => '3dc6f581829d5b9a9df5ec4036db1bec', 'sender' => 'modelz','number'=>$data['phone'],'route'=>'2','type'=>1, 'sms'=> $smsContent ) )
            ->post();
    }

    //prevent user from attempting more than 6 notifications
    protected function notification_lock($data){
        if($data>6){
            session()->flash('err_msg','You have reached notification limit, Kindly contact Modellz for further details');
            return redirect()->to('/public/login');
        }
    }

    //resend sms
    public function resendSms(){
        $user = public_users::where('email', session('tmp_EM'))->orWhere('phone',session('tmp_EM'))->first();
        if($user->num_of_sends>6){
            session()->flash('err_msg','You have reached notification limit, Kindly contact Modellz for further details');
            echo '<script>
                  window.location.href = "/public/login";
                  </script>';
        }else{
            $rand = rand(10000,99999);
            $user->sms_code = $rand;
            $user->save();
            $smsContent = "Hi $user->name,Use this code to activate your account.$rand";
            $this->SendActiveSms($user,$smsContent,$user->id);
            echo '<div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             OTP send successfully !.
            </div>';
        }
    }

    //resend Email
    public function resendMail(){
        $user = public_users::where('email', session('tmp_EM'))->orWhere('phone',session('tmp_EM'))->first();
        if($user->num_of_sends>6){
            session()->flash('err_msg','You have reached notification limit, Kindly contact Modellz for further details');
            echo '<script>
                  window.location.href = "/public/login";
                  </script>';
        }else{
            $user->token=Str::random(32);
            $user->save();
            $this->SendActiveMail($user);
            echo '<div class="card">
                        <div class="card-body">
                               <div class="alert alert-success">
                                    <a href="#" class="close p-1" data-dismiss="alert" aria-label="close">&times;</a>
                                  Your activation link is send successfully, Kindly check mail inbox.
                               <button class="btn btn-success"><a href="/public/login" style="color: white;">Click here to Login !</a></button>
                             </div></div>';
        }
    }
}
