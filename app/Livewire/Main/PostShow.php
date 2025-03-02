<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\{Tag, Post};

#[Layout('layouts.app')]
#[Title('Blog post detail')]
class PostShow extends Component
{
    public Post $post;
    public $tags;

    public $resentPosts;

    public function mount() {
        $this->tags = Tag::whereHas('posts', function($query){
            $query->latest();
        })->take(10)->get();
        $this->resentPosts = Post::latest()->take(4)->get();
    }

    public function render()
    {
        return view('livewire.main.post-show', [
            'post'=>$this->post, 'resentPosts'=>$this->resentPosts
        ]);
    }
}
