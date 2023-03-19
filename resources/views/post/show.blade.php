@extends('layout.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title : {{$post['title']}}</h5>
            <p class="card-text">Description : {{$post['description']}}</p>
        </div>
    </div>
    <div class="card mt-6">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Created By : {{$post->user->name}}</h5>
        </div>
    </div>

@endsection