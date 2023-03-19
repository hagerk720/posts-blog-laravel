<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $allPosts = Post::all();
        // dd($allPosts);
        return view('post.index', ['posts' => $allPosts]);
    }
    public function show($id)
    {     
        $post = Post::find($id);
        return view('post.show', ['post' => $post]);
    }
    public function create(){
        $users = User::all();

        return view('post.create' ,['users' => $users]);
    }
    public function edit($id){
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }
    public function store(Request $request){    
        $title = $request-> title ; 
        $description = $request-> description ; 
        $createdBy = $request-> creator ; 
        Post::create([
           'title'=>$title,
           'description'=>$description,
           'user_id'=>$createdBy 
        ]);
        return redirect() -> route('posts.index');
    }
    public function update($id )
    {
        $title = request()-> title ; 
        $description = request()-> description ; 
        $createdBy = request()-> creator ; 
        Post::where('id', $id )->update([
            'title'=>$title,
            'description'=>$description,
           'user_id'=>$createdBy 
        ]);
        return redirect() -> route('posts.index');
    }
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect() -> route('posts.index');
    }
    
}