<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required')]
    public $title = '';
    
    #[Validate('required')]
    public $content = '';
    public $status = "draft";
    public $user_id;
    public array $tags = [];

    public function store() {
        $this->validate();

        $this->user_id = Auth::id();
        $post = Post::create($this->all());
        $post->tags()->sync($this->tags);
    }

    public function setPost(Post $post) {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->user_id = $post->user_id;
    }

    public function update() {
        $this->validate();
        $this->post->update($this->all());
    }

}
