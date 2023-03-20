<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        // $allPosts = Post::all();
        $allPosts = Post::paginate(5);
        return view('post.index', ['posts' => $allPosts]);
    }
    public function show($id)
    {     
        $post = Post::find($id);
        // $comments = Comment::where('post_id', $id )->get();
        // foreach ($post->comments as $comment) {
        //     // ...
        // }
        // dd($post->comments);
        return view('post.show', ['post' => $post]  );
    }
    public function create(){
        $users = User::all();

        return view('post.create' ,['users' => $users]);
    }
    public function edit($id){
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }
    public function store(StorePostRequest $request){   
        // $request->validate([
        //     'title' =>'required|min:3|unique:posts,title',
        //     'description' =>'required|min:10',
        // ]); 
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
    public function showDeletedPosts(){
        $deletedPosts = Post::onlyTrashed()->get();
        return view('post.deletedPosts', ['deletedPosts' => $deletedPosts]);     
    }
    public function restore($id){
        Post::withTrashed()->find($id)->restore();
        return redirect() -> route('posts.index');
    }
    
}