<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function get_user(){

        $userid=auth()->user()->user_id;
        //$userid=request('email');
        $user=User::find($userid);
        return response()->json([

            'status' =>200,
            'data'   =>$user,
            'message'=>'Loged in',   
        ]);
    }

    public function user_login(){
        $user=User::where('email',request('email'))->first();
        
        if(Hash::check(request('password'),$user->password)){
            $token=$user->createToken('app')->plainTextToken;
            return response()->json([
                'token'=>$token,
                'status'=>200,
            ]);
            
        }else{
            return response()->json([
                'message'=>'Password Invalid'
            ]);
        }

        if($user){
            return response()->json([
                'user'=>$user,
                'status'=>200,
            ]);

        }else{
            return response()->json([
                'username'=>request('username'),
                'email'=>request('email'),
                'message'=>'Invalid User Name',
                'status'=>250,
            ]);

        }
       
    }

    public function user_logout(Request $request){
        //$request->header('token');
        //$userid=request('email');
        $userid=auth()->user()->user_id;
        //dd($userid);
        $user=User::find($userid);
        $user->tokens()->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Logged out',
        ]);
    }
}
