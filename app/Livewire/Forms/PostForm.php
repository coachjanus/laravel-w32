<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public $cover;
    public $oldCover;

    public function store() {
        $this->validate();
        $this->user_id = Auth::id();
        $this->cover = $this->cover->store('posts', 'public');
        $post = Post::create($this->all());
        $post->tags()->sync($this->tags);
        $this->reset();
    }

    public function setPost(Post $post) {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->user_id = $post->user_id;
        $this->oldCover = $post->cover;
        $this->tags = $post->tags->pluck('id')->all();
    }

    public function update() {
        $this->validate();
        if ($this->cover) {
            if($this->oldCover !== null && Storage::disk('public')->exists($this->oldCover)) {
                Storage::disk('public')->delete($this->oldCover);
            }
            $this->cover = $this->cover->store('posts', 'public');
        } else {
            $this->cover = $this->oldCover;
        }
        $this->post->update($this->all());
        $this->post->tags()->sync($this->tags);
        $this->reset();
    }
}
