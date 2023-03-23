@extends('layouts.app')


@section('title') Show @endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 d-flex flex-column">
      <h1>{{$post['title']}}</h1>
      <p class="lead">{{$post['created_at']}}</p>
      <img src="{{asset($post['image'])}}"  alt="" class="img-fluid align-self-center">
      <hr>
      <p>{{$post['description']}}</p>
      <div class="post-tags">
        <ul class="tag-list d-flex">
          @foreach ($post->tags as $tag)
            <li class="tag-item d-flex">
              {{ $tag->name }}
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
    @livewire('add-comment' , ['post'=>$post])

     @livewire('comments-list' , ['post'=>$post])


@endsection