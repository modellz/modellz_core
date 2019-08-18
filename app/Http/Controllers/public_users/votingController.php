<?php

namespace App\Http\Controllers\public_users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\award_category;
use App\votes;
use App\public_users;

class votingController extends Controller
{
    //use to store votes
    public function store(Request $request){
       $publicid=public_users::where('email',session('public_email'))->first();
        $check=votes::where(['p_id'=>$publicid->id,'b_id'=>$request->b_id,'category'=>$request->category])->first();
        if($check){
            $data=votes::find($check->id);
            $data->updated_at=now();
            $status='Successfully modified';
        }
        else{
            $data=new votes();
            $status='Successfully voted';
        }
        $data->p_id=$publicid->id;
        $data->b_id=$request->b_id;
        $data->category=$request->category;
        $data->votes=$request->votes;
        try{
            $data->save();
            echo '<br/><div class="alert alert-success alert-dismissible"> 
                         <strong>'.$status.' '.$request->votes.' points for '.$request->category.' Category</strong><br>Click again to modify your votes !</div>';
        }
        catch (\Exception $e){
            echo 'Something went wrong '.$e;
        }
            }//store ends

}
