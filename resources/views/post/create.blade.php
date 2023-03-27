@extends('layouts.app')

@section('title')Create @endsection

@section('content')

@if(session('message'))
      <div class="alert alert-danger">
        {{session('message')}}
       </div>

@endif
  <h1>Create a new post</h1>
  <form method="POST" action="{{ route('posts.store') }}" class="d-flex flex-column" enctype="multipart/form-data" >
  @csrf
    <div class="form-group">
      <label for="postTitleInput">Post Title</label>
      <input type="text" class="form-control" id="postTitleInput" name="title">
    </div>
    <div class="form-group">
      <label for="postDescriptionInput">Post Description</label>
      <textarea class="form-control" id="postDescriptionInput" rows="3"name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="postTitleInput">Tags</label>
      <input type="text" class="form-control" id="postTitleInput" name="tags">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="creator" class="form-control">
            @foreach($users as $user)
            <option value="{{$user->id}}" name = "user_id">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group align-self-end">
      <label for="postImageInput">Post Image</label>
      <input type="file" class="form-control-file btn btn-outline-danger" id="postImageInput" name="image">
    </div>
    <button type="submit" class="btn btn-outline-success mt-4 fw-bold w-25 align-self-center">Create Post</button>
  </form>

@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif