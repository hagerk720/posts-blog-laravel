<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request , $post_id){    
        $title = $request-> comment ; 
        dd(Auth::user()->id);
        $post = Post::find($post_id);
        $post->comments()->create([
            'comment' => $title,   
            'user_id' => Auth::user()->id,  
        ]);
        return redirect()->
            route('posts.show', $post_id);
    }
    public function delete($post_id,$comment_id){
        $post = Post::find($post_id);
        $post->comments()->where('id',$comment_id)->delete();
        return redirect()->
            route('posts.show', $post_id);
    }
}
