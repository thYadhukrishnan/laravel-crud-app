<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage(){
        $age=30;
        $status=1;
        $users=User::all(); //select *from users;
        /*return $users;
        $users=User::find(1);
        return $users;*/
        return view('welcome',compact('age','status','users'));
    }
    public function about(){
        return view('about-us');
    }
    public function contact(){
        return view('contact-us');
    }
    public function create(){
        return view('create');
    }
    public function save(){
        $name=request('name');
        $email=request('email');
        $dob=request('date_of_birth');
        $user=User::updateOrCreate([
            'email' => $email],[
            'name' => $name,
            'date_of_birth' => $dob,
        ]);
        return redirect()->route('home')->with('message','User Created Successfully...');
    }
    public function edit($userId){
        $user=User::find(decrypt($userId));
        return view('edit',compact('user'));
    }
    public function update(){
        $user=User::find(decrypt(request('user_id')));

        $user->update([

            'name'=>request('name'),
            'email'=>request('email'),
            'dob'=>request('date_of_birth'),
        ]);
        return redirect()->route('home')->with('message','Updated...');
    }
    public function delete($userId){
        $user=User::find(decrypt($userId));
        $user->delete();
        return redirect()->route('home')->with('message','Deleted...');
    }
}
