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
      <!-- Upload Image -->
      @if($user->profile)
      @if ($user->profile->hasMedia('profile_image'))
        <img src="{{asset($user->profile->getFirstMediaUrl('profile_image')) }}" alt="Profile Image" class="rounded-circle mb-3" style="width: 150px; height:150px; object-fit: cover;">
      @endif
      @endif
      <form action="{{ route('profile.image.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
         <!-- <input type="file" name="profile_image"> -->
         <div class="custom-file">
         <input type="file" class="" id="customFile" name="profile_image">
        </div>
         <button class="btn btn-warning mt-2" type="submit"> upload</button>
      </form>
   
     </div>
    <!-- Edit Profile -->
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
      <td><input type="text" class="form-control" id="exampleFormControlInput1"  name="address" value="{{$user->profile ? $user->profile->address : '' }}"></td>
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
