<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public $allPosts = [
        [
            'id' => 1,
            'title' => 'Laravel',
            'posted_by' => 'Hager',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description'
        ],

        [
            'id' => 2,
            'title' => 'PHP',
            'posted_by' => 'Mariam',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description'
        ],

        [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Alaa',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description'
        ],
    ];
    public function index()
    {
        return view('post.index', ['posts' => $this-> allPosts]);
    }
    public function show($id)
    {     
        return view('post.show', ['post' => $this->allPosts[$id-1]]);
    }
    public function create(){
        return view('post.create');
    }
    public function edit($id){
        return view('post.edit' ,['post' => $this-> allPosts[$id-1]]);
    }
    public function store(){    
        return redirect() -> route('posts.index');
        // return view('post.index', ['posts' => $this-> allPosts]);

    }
    public function update()
    {
        return redirect() -> route('posts.index');
    }
}