@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <div>
@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif    

<a class="btn btn-outline-success mt-4 fw-bold w-25 align-self-center" href="{{route('posts.create')}}"> Create Post</a>
    <table class="table mt-4 table-auto">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            <th scope="col">slug</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{date('d-m-Y', strtotime($post->created_at)) }}</td>
                <td style="width: 300px;">
                    <x-buttons href="{{route('posts.show', $post['id'])}}" type="success" value="View" />
                    <x-buttons href="{{route('posts.edit', $post['id'])}}" type="primary" value="Edit" />
                    <x-buttons type="danger" value="delete" data-bs-toggle="modal" data-bs-target="#modal{{ $post->id}}" /> 
                    
                </td>
                <td style="width:150px">{{$post['slug'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="d-flex justify-content-center">
    {!! $posts->links() !!}
    </div>
    </div>
@endsection

<!-- Modal -->

@section('modal')
        <!-- @foreach($posts as $post) -->
<div class="modal fade" id="modal{{$post->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Post ❓❗</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post {{$post['id']}}
                        </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="POST" action="{{route('posts.delete', $post['id'])}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Yes</button> 
                            </form>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- @endforeach -->

@endsection