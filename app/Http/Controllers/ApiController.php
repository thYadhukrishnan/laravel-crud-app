<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_user(){

        $userid=request('email');
        $user=User::where('email','=',$userid)->get();
        return response()->json([

            'status' =>200,
            'data'   =>$user,
            'message'=>'Loged in',   
        ]);
    }

    public function user_login(){
        
    }
}
