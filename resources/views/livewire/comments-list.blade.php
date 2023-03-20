<div>
<section >
  <div >
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
                  <!-- @livewire('delete-comment' , ['post'=>$post ,'comment'=>$comment]) -->
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
  </div>
</section></div>
