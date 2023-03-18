@extends('layout.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}">
        <button type="button" class="mt-4 btn btn-success">Create Post</button>
        </a>
    </div>
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

        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <!-- <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a> -->
                    <!-- <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a> -->
                    <!-- <a href="#" class="btn btn-danger">Delete</a> -->
                    <x-buttons href="{{route('posts.show', $post['id'])}}" type="info" value="View" />
                    <x-buttons href="{{route('posts.edit', $post['id'])}}" type="primary" value="Edit" />
                    <x-buttons type="danger" value="delete" />
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>

@endsection