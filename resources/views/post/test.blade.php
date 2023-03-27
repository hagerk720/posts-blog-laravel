@extends('layouts.app')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('title') Index @endsection
@section('content')
    <div>
@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif    

<a class="btn btn-outline-success mt-4 fw-bold w-25 align-self-center" href="{{route('posts.create')}}"> Create Post</a>
    <table class="table mt-4 table-auto" id="myTable">
        <thead class="table-dark">
        <tr>
            <!-- <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            <th scope="col">slug</th> -->
            <th scope="col" class="text-center" scope="col">ID</th>
            <th scope="col" class="text-center" scope="col">Title</th>
            <th scope="col" class="text-center" scope="col">Slug</th>
            <th scope="col" class="text-center" scope="col">Posted By</th>
            <th scope="col" class="text-center" scope="col">Created At</th>
            <th scope="col" class="text-center" scope="col">Actions</th>
        </tr>
        </thead>
   
    </table>



    </div>
@endsection

<!-- Modal -->

@section('modal')


@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>

   $(function(){

      let table =  $('#myTable').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
                url: "{{ route( 'posts.index' ) }}"
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'slug', name: 'slug'},
            {data: 'user_id', name: 'user_id'},
            {data: 'created_at', name: 'created_at'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
        ]
    });

    });
    </script>
@endpush