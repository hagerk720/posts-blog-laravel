<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddComment extends Component
{
    public $comment ; 
    public $post ; 
    public function add(){
        $this-> post->comments()->create([
            'comment' => $this-> comment,        
        ]);
       $this->emit('commentAdded');
       $this->reset();

    }
    public function render()
    {
        return view('livewire.add-comment');
    }
  
}
