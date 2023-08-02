<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ModalComponent extends Component
{
    public $showModal = false;
    public $postId;
    public $post;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->post = Post::find($postId);
    }
    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.modal-component');
    }
}
