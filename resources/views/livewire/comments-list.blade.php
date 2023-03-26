<div class="d-flex w-75 container">
<?php

use App\Models\Post;
use app\Models\User; ?>

      <div class="col-12">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0">Recent comments</h4>
            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
           <?php $comments = Post::with('comments' )->where('id', $post->id )->get();?>
           @foreach($comments as $comment)
            <div class="d-flex flex-start w-100 " >
              <!-- <div class="rounded-circle shadow-1-strong me-1"
               style="background-color: aquamarine; width:30px ; height:30px"></div>-->
               <!-- @if(Auth::user()->profile) -->
               <img src="{{asset(User::find($comment->user_id)->profile->getFirstMediaUrl('profile_image')) }}" alt="Profile Image" class="rounded-circle mb-3 me-1" style="width: 30px; height:30px; object-fit: cover;">
                <!-- @endif -->
               <div> 

                <div class="row d-flex justify-content-between ">
                <div class="col-8 fw-bold">{{User::find($comment->user_id)->name}}</div>
                <div class="col-4 d-flex align-items-center mb-1">
                  <!-- <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a> -->
                  <form method="post" action="{{route('comments.delete' ,  [$post->id , $comment->id])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn bg-transparent ">❌</button>
                  </form>
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
