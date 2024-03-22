<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }


    public function index(){

        $users=User::where('id', '!=', auth()->user()->id)->get();

        return view('users.index', compact('users'));
    }

    public function show($id){

        $user=User::find($id);

        return view('users.show', compact('user'));
    }

    public function edit(){

        // $user=User::auth();

        return view('users.edit');
    }

    public function update(Request $request){
        // dd($request->all());

         //Validation => checking if a request is following rules 

        //Rules:
        // For first name, last name ->(required) it should not be null or it should always have a value
        // (max)length shold only be until 255

        // How to validate
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            // 'new_password' => 'required|max:255|min:8|Confirmed'
        ]);

        // Check if there is a value in the new_password input
        if(!empty($request->new_password)){
            //Validate new_password
            $request->validate([
                'new_password' => 'required|max:255|min:8|confirmed'
            ]);

            // after validating, updating the password
             auth()->user()->update([
                "password" =>Hash::make($request->new_password) //Hash::make() is for encrypting
             ]);  
        }
        
        //Do this if it is valid
        auth()->user()->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name
        ]);
        
        return redirect('/home');
    }

    public function changeAvatar(){

        return view('users.changeAvatar');
    }

    public function uploadAvatar(Request $request){
        // Validation
        // dd($request->input("avatar"));
        $request->validate([
            'avatar'=> 'required|image|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        // dd("tes");

        // if(auth()->user()->avatar !="user-image.png"){
              // Delete the file in public/images folder
        // }

        $fileName=time() . '.' .
        $request->avatar->getClientOriginalExtension();
        // Save to /public/images folder
        $request->avatar->move(public_path('img'), $fileName);

        //Save the $fileName to users table
        auth()->user()->update([
            'avatar'=>$fileName
        ]);

        return redirect()->route('home');
        }


        public function follow($followed_id){

            $follower = auth()->user();
            $followed = User::find($followed_id);

            $follower->followedUsers()->attach($followed);

            // return redirect()->route('index');
            return back();
        }


        public function unfollow($followed_id){
            $follower=auth()->user();
            $toUnfollowUser = User::find($followed_id);

            $follower->followedUsers()->detach($toUnfollowUser);

            // return redirect()->route('index');
            return back();
        }

        public function following($id){
            // $following=User::find($id);

            $user = User::find($id);
            $following = $user->followedUsers()->get();
            // $users = User::where('id', '=', auth()->user()->followers())->get();

    

            return view('users.following' , compact('user', 'following'));
        }

        public function followers($id){
            // $followers=User::find($id);

            // $users=User::where('id', '!=', $id)->get();
            $user = User::find($id);
            $followers = $user->followers()->get();
    

            return view('users.followers' , compact('user', 'followers'));
        }
}
