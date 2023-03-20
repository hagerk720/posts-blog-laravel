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
    <p>
</div> 
`<button class="btn btn-success mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    Add Comment
  </button>
</p>
<div style="min-height: 10px;">
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
  <form method="post" action="{{ route('comments.store' , [$post->id] ) }}">
    @csrf
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Your comment</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
</div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">add</button>
</div>
</form>

  </div>
</div> 
<section style="">
  <div class="">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0">Recent comments</h4>
            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
           
           @foreach($post->comments as $comment)
            <div class="d-flex flex-start" style="flex-grow: 1 !important;">
              <div class="rounded-circle shadow-1-strong me-1"
               style="background-color: aquamarine; width:30px ; height:30px"></div>
               <div>
                <div class="d-flex justify-content-between flex-grow-1">
                <h6 class="fw-bold ">User Name</h6>
                <div class="d-flex align-items-center mb-1">
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <form method="post" action="{{route('comments.delete' ,  [$post->id , $comment->id])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn bg-transparent ">❌</button>
                  </form>
                  <!-- <a href="{{route('comments.delete' ,  [$post->id , $comment->id])}}" class="link-muted text-decoration-none">❌</a> -->
                </div>  
               </div>
              <p class="mb-2">
                  {{$comment['comment']}}
                </p>
              </div>
              
            </div>
            @endforeach
         
          </div>
          <hr class="my-0" />        
        </div>
      </div>
    </div>
  </div>
</section>

@endsection