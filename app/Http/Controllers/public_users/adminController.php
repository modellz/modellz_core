<?php

namespace App\Http\Controllers\public_users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\award_category;
use App\votes;
use App\blogs;

class adminController extends Controller
{
    //admin dashboard
    public function dashboard(){
        $categorys=award_category::all();
        return view('public_voting.admin.dashboard')->with(['awards'=>$categorys]);
    }
    //main query
    public function  get_query($award){
        $blogs=blogs::all();
        $sequence=array();
        foreach ($blogs as $blog){
            $datas=votes::where(['category'=>$award,'b_id'=>$blog->id])->get();
            $sum=0;
            if($datas){
                foreach ($datas as $data){
                    $sum+=$data->votes;
                }
            }
            $sequence[$blog->id]=$sum;
        }//foreach movie wise
        return $sequence;
    }//end get_query

}//class end
