@extends('layouts.app')

@section('title') Profile @endsection

@section('content')
     
    <div class="container 
     d-flex justify-content-center align-items-center flex-column"
     >
     <div class="d-flex justify-content-center align-items-center flex-column">
     @if(session('message'))
      <div class="alert alert-success">
        {{session('message')}}
       </div>
      @endif
       <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;"
  alt="Avatar" /> 
   <button class="btn btn-warning mt-2" type="submit"> upload</button>
     </div>

<form action="{{ url('profile')}}" method="post" class="w-100 d-flex flex-column" >  
  @csrf 
    <table class="table table-borderless">
  <tbody>
    <tr >
      <th scope="row"></th>
      <td class="h1">Full Name</td>
      <td><input type="text" class="form-control" id="exampleFormControlInput1"  name="name" value="{{$user['name']}}"></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td class="h1">Email</td>
      <td>  <input type="email" class="form-control" id="exampleFormControlInput1"  name="email" value="{{$user['email']}}">
</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td class="h1">Address</td>
      <td><input type="text" class="form-control" id="exampleFormControlInput1"  name="address" value="{{$user->profile->address}}"></td>
    </tr>
    <!-- <tr>
      <th scope="row"></th>
      <td>password</td>
      <td><input type="text" class="form-control" id="inputPassword" name="password" value="{{$user['password']}}"></td>
    </tr> -->
</tbody>
</table>
<button type="submit" class="align-self-end btn btn-outline-success"> Edit</button>  
</form>

    </div>
@endsection
