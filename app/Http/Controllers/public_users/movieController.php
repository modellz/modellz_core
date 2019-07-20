<?php

namespace App\Http\Controllers\public_users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blogs;

class movieController extends Controller
{
    //
    public function paginate(){
        $data = blogs::paginate(25);
        echo json_encode($data);
    }
}
