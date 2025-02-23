<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Livewire\Forms\PostForm;
use App\Enums\PostStatus;
use App\Models\{Tag, Post};

#[Layout('layouts.app')]
#[Title('Edit Post')]
class EditPost extends Component
{
    public $title = "Edit Post";

    public PostForm $form;
    public $postStatus;
    public $tags;  

    public function mount(Post $post) {
        $this->postStatus = PostStatus::cases();
        $this->tags = Tag::pluck('name', 'id') ;

        $this->form->setPost($post);
    }

    public function save() {
        $this->form->update();
        return $this->redirect('/admin/posts');
    }

    public function render()
    {
        return view('livewire.admin.posts.edit-post');
    }
}
