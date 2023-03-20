@extends('layout.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}">
        <button type="button" class="mt-4 btn btn-success">Create Post</button>
        </a>
    </div>
    <div>
        
    <table class="table mt-4 ">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deletedPosts as $deletedPost)
            <tr>
                <td>{{$deletedPost['id']}}</td>
                <td>{{$deletedPost['title']}}</td>
                <td>{{$deletedPost->user->name}}</td>
                <td>{{$deletedPost['created_at']}}</td>
                <td>
                    <x-buttons type="danger" value="Restore" href="{{route('posts.restore', $deletedPost['id'])}}"/>                  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection