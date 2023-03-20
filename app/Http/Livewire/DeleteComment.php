<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteComment extends Component
{
    public $post ; 
    public $comment ; 
    public function render()
    {
        return view('livewire.delete-comment');
    }
    public function delete(){
      $this-> post->comments()->where('id',$this -> comment ->id)->delete();
      $this->emit('comment');

    }
}
