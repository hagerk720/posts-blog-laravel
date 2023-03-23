@extends('layouts.app')


@section('title')Create @endsection

@section('content')
@if(session('update'))
      <div class="alert alert-success">
        {{session('update')}}
       </div>

@endif
<form method="post" action="{{ route('posts.update' ,  [$post->id] ) }}" class="d-flex flex-column " enctype="multipart/form-data">
    @csrf
    @method('patch')
    <img src="{{asset($post['image'])}}" alt="" class="img-fluid align-self-center">
    <div class="form-group align-self-end">
      <input type="file" class="form-control-file btn btn-outline-danger" id="postImageInput" name="image">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$post['title']}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post['description']}}</textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="creator" class="form-control" value="{{$post['user_id']}}">
            <option value="{{$post['user_id']}}">{{$post->user->name}}</option>
        </select>
    </div>
    <div class="form-group">
      <label for="postTitleInput">Tags</label>
      <input type="text" class="form-control" id="postTitleInput" name="tags">
    </div>

    <button type="submit" class="btn btn-outline-success align-self-center w-25 mt-2">Update</button>
</form>
<div class="post-tags">
        <ul class="tag-list d-flex">
          @foreach ($post->tags as $tag)
            <li class="tag-item d-flex m-1">
              {{ $tag->name }}
              <form method="POST" action="{{ route('post.tags.detach', [$post->id, $tag->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">
                  <i class="fa fa-times"></i>
                </button>
              </form>
            </li>
          @endforeach
        </ul>
      </div>
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