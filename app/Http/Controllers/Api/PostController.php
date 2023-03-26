<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Rules\MaxPostsPerUser;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    public function index(){
        $allPosts = Post::orderBy('id', 'desc')->paginate(5);
        return PostResource::collection($allPosts);
    }
    public function show($id)
    {     
        $post = Post::find($id);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request){  
        $maxPosts=new MaxPostsPerUser(); 
        
        if($maxPosts->passes('Max_Posts_Per_User',$request))
         {
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = $request->creator;
            $tagNames  = explode(",", $request ->tags);
            if ($request->hasFile('image')) {
                $post->image =  $request->file('image');
            }
            $post->save();
            $tags = Tag::findOrCreate($tagNames);
            $post -> attachTags($tags);
            return new PostResource($post);
        }
        else{
            //return redirect() -> back()->with('message',$maxPosts->message());
        }
    }
}
