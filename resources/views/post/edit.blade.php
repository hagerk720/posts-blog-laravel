@extends('layout.app')

@section('title')Create @endsection

@section('content')
<form method="patch" action="{{ route('posts.update') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="" value={{$post['title']}}>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post['description']}}</textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="creator" class="form-control" >
            <option value="hager">Hager</option>
            <option value="Mariam">Mariam</option>
            <option value="Alaa">Alaa</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection