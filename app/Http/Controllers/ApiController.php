<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_user(){

        $userid=request('userid');
        $user=User::find($userid);
        return response()->json([

            'status' =>200,
            'data'   =>$user,
            'message'=>'Loged in',   
        ]);
    }
}
