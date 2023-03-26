<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Rules\MaxPostsPerUser;
use Illuminate\Http\Request;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    
    public function index()
    {
        // $allPosts = Post::all();
        $allPosts = Post::orderBy('id', 'desc')->paginate(5);
        return view('post.index', ['posts' => $allPosts]);
    }
    public function show($id)
    {     
        $post = Post::find($id);
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
            return redirect() -> route('posts.index');
        }
        else{
            return redirect() -> back()->with('message',$maxPosts->message());
        }
    }
    public function update(StorePostRequest $request ,$id )
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->creator;
        $tagNames  = explode(",", $request ->tags);
        if($request->hasFile('image')){
            $post->image =  $request->file('image');
        }
        $post->save();
        $tags = Tag::findOrCreate($tagNames);
        $post -> attachTags($tags);
        return redirect() -> back()->with('updated','post updated successfully');
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
        return redirect()->route('posts.index')
        ->with('success', 'the post has been restored.');
    }
    public function destroy($id){
        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->route('posts.index')
                         ->with('success', 'the post has been permanently deleted.');
    }


    public function restoreAll(){
        $posts = Post::onlyTrashed()->get();

        foreach ($posts as $post) {
            $post->restore();
        }
    
        return redirect()->route('posts.index')
                         ->with('success', 'All deleted posts have been restored.');
    }
    public function destroyAll(){

        $posts = Post::onlyTrashed()->get();

        foreach ($posts as $post) {
            $post->forceDelete();
        }
    
        return redirect()->route('posts.index')
                         ->with('success', 'All deleted posts have been permanently deleted.');

    }
    public function detachTag(Request $request,Post $post, Tag $tag)
    {
        $post->detachTag($tag);

        return redirect()->back()->with('success', 'Tag detached successfully.');
    }
    public function deleteOldPosts()
    {
        dispatch(new PruneOldPostsJob());
        return redirect()->back()->with('message', 'Old posts have been deleted.');
    }
}