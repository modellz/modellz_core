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
        }
        else{
            $data=new votes();
        }
        $data->p_id=$publicid->id;
        $data->b_id=$request->b_id;
        $data->category=$request->category;
        try{
            $data->save();
            echo 'Success!';
        }
        catch (\Exception $exception){
            echo 'Something went wrong';
        }

            }
}
