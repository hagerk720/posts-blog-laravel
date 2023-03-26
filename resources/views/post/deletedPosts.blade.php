@extends('layouts.app')


@section('title') Index @endsection

@section('content')

    <div>

    <a class="btn btn-outline-success mt-4 fw-bold w-25 align-self-center" href="{{route('posts.restoreAll') }}">Restore All</a>
    <a class="btn btn-outline-danger mt-4 fw-bold w-25 align-self-center" href="{{route('posts.destroyAll') }}">Destroy All</a>

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
                    <x-buttons type="success" value="Restore" href="{{route('posts.restore', $deletedPost['id'])}}"/>                  
                    <x-buttons type="danger" value="destroy" href="{{route('posts.destroy', $deletedPost['id'])}}"/>                  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection