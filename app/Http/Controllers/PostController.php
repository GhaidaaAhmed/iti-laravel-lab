<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\post;
use App\User;
use Illuminate\Pagination\Paginator;


class PostController extends Controller
{
    //
    
    public function index(){
    $posts=post::paginate(3);
        return view('posts.index',[ 'posts'=> $posts ]);
    }

    public function show(Request $request,$id){
        $post=post::find($id);
        if($request->ajax()){
            $user=$post->user;
            //,'user'=>$user
            return response()->json(['post'=>$post]);
        }
        return view('posts.show',[ 'post'=> $post ]);
    }

    public function create(){
        $users=User::all();
        return view('posts.create',[ 'users'=> $users ]);
    }
    public function store(StorePostRequest $request){
        $input=$request->only(['title', 'description','user_id']);
        post::create($input);
            /*[
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]*/
       return redirect('posts'); 
        

    }
    public function edit($id){
        $post=post::find($id);
        $users=User::all();
        return view('posts.update',[ 'post'=> $post,'users'=> $users ]);
    }
    public function update($id, Request $request){
        $request->validate([
            'title' => 'required|min:3|unique:posts,title,'.$id,
            'description'=>'required|min:10',
            'user_id' => 'required|exists:users,id'
        ]);

        $post=post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->slug = null;
        $post->save();
        return redirect('posts'); 
    }
    public function destroy($id){
        $post=post::find($id);
        $post->delete();
        return redirect('posts'); 
    }
    
}
