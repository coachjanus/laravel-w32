<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Livewire\Forms\PostForm;
use App\Enums\PostStatus;
use App\Models\{Tag};

#[Layout('layouts.app')]
#[Title('Create Post')]
class CreatePost extends Component
{
    public $title = "Create New Post";

    public PostForm $form;
    public $postStatus;
    public $tags;  

    public function mount() {
        $this->postStatus = PostStatus::cases();
        $this->tags = Tag::pluck('name', 'id') ;
    }

    public function save() {
        $this->form->store();
        return $this->redirect('/admin/posts');
    }

    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
