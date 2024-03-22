<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{   
    // public function store(Request $request){
        // $post=new Post();
        // $post->user_id = auth()->user()->id;
        // $post->content = $request->message;
        // $post->save();
        // return redirect('/home');
    // }
    public function store(Request $request) {
         $user = User::find(auth()->user()->id);
         $user->posts()->create(["content"=>$request->message]);
         return redirect('/home');

        //auth()->user()->posts()->create(['content'=>$request->message]);
        // return redirect('/home');

/*
        $post=Post::create([
            "content"->request->message,
            "user_id"->Auth::user()->id
        ]);
*/
    }

    public function edit($id){
        $edit = Post::find($id);
        return view('posts.edit', compact('edit'));
    }

    public function update(Request $request, $id){
        // dd($request->all());

        $update = Post::find($id);
        
        $update->update([
            'content'=>$request->content
        ]);

        return redirect('/home');
        //>route('home');
    }

    public function delete($id){
        $delete=Post::find($id);

        $delete->delete();
        return redirect('/home');
    }

}
