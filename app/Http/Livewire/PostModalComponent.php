<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostModalComponent extends Component
{
    // public $showModal = false;
    public $postId;
    public $post;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->post = Post::find($postId);
    }
    // public $postId;

    // public function mount($postId)
    // {
    //     $this->postId = $postId;
    // }

    public function getPostProperty()
    {
        return Post::findOrFail($this->postId);
    }
    // public function openModal()
    // {
    //     $this->showModal = true;
    // }

    // public function closeModal()
    // {
    //     $this->showModal = false;
    // }
    public function render()
    {
        return view('livewire.post-modal-component');
    }
}
