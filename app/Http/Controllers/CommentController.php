<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request , $post_id){    
        $title = $request-> comment ; 
        $post = Post::find($post_id);
        $post->comments()->create([
            'comment' => $title,        
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
