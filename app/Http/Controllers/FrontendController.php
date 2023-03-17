<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage(Request $request){
        $age=30;
        $status=1;
        $users=User::paginate(5); //select *from users;
        /*return $users;
        $users=User::find(1);
        return $users;*/
        $current_page = $request->input('page', 1);
        return view('welcome',compact('age','status','users','current_page'));
    }
    public function about(){
        return view('about-us');
    }
    public function contact(Request $request){
        $query=User::query();
        if($request->ajax()){
            $users=$query->where(['user_id'=>$request->name])->get();
            return response()->json(['users'=>$users]);
        }
        $users=$query->get();
        return view('contact-us',compact('users'));
    }
    public function create($current_page){
        return view('create',compact('current_page'));
    }
    public function save(){
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'date_of_birth'=>'required',
            'hobbies'=>'required',
        ]);
        $page=request('page');
        $name=request('name');
        $email=request('email');
        $dob=request('date_of_birth');
        $hobbies=implode(",",request('hobbies'));
        $user=User::updateOrCreate([
            'email' => $email],[
            'name' => $name,
            'date_of_birth' => $dob,
            'hobbies'=>$hobbies,
        ]);
        return redirect()->route('home', ['page'=>$page])->with('message','User Created Successfully...');
    }
    public function edit($userId,$current_page){
        $user=User::find(decrypt($userId));
        return view('edit',compact('user','current_page'));
    }
    public function update(Request $request){
        $user=User::find(decrypt(request('user_id')));
        
        $currentPage=request('page');
        //dd($page);
        $user->update([

            'name'=>request('name'),
            'email'=>request('email'),
            'dob'=>request('date_of_birth'),
            'hobbies'=>implode(",",request('hobbies')),
        ]);
        //return redirect()->route('home',['currentPage'=>])
        //return redirect()->back()->withInput(['page'=>$page]);
        //return redirect()->route('home')->with('message','Updated...');
        //return redirect('home', ['page' => $request->page]);
        //$currentPage = $request->input('page', 1);
        return redirect()->route('home', ['page' => $currentPage]);
    }
    public function delete($userId){
        $user=User::find(decrypt($userId));
        $user->delete();
        return redirect()->back()->with('message','User Deleted Successfully...');
    }
    public function ajax(){

        return view('ajax');
    }
    public function show(){
        //$data=User::where('name','=','name')->get();
        $data=User::all();
        return response()->json(['data'=>$data]);
        //return view('show');
    }
    public function jsave(){
        $name=request('name');
        $data=User::where('name','=',$name)->get();
        return response()->json(['data'=>$data]);
    }
    public function search(Request $request){
        $query=User::query();
        if($request->ajax()){
            if(empty($request->name)){
                $users=$query->get();

            }
            else{
                $users=$query->where(['user_id'=>$request->name])->get();

            }
            
            return response()->json(['users'=>$users]);
        }
        $users=$query->get();
        return view('search',compact('users'));

    }
    
    public function view(){
        return view('view');
    }
}
