<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentsList extends Component
{
    public $post ;  
    public $listeners =['commentAdded' => '$refresh' ];

    
    public function render()
    {
        return view('livewire.comments-list');
    }

}
// 'commentAdded' => '$refresh' ,