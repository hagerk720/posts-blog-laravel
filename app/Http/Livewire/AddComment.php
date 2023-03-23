<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddComment extends Component
{
    public $comment ; 
    public $post ; 
    public function add(){
        $this-> post->comments()->create([
            'comment' => $this-> comment,   
            'user_id' => Auth::user()->id,  
     
        ]);
       $this->emit('commentAdded');
       $this->reset();

    }
    public function render()
    {
        return view('livewire.add-comment');
    }
  
}
