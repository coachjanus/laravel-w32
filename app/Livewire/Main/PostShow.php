<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

use App\Models\{Post, Tag};
#[Title('Blog post page')]
#[Layout('layouts.app')]
class PostShow extends Component
{
    public Post $post;

    public $tags = [];

    public $resentPosts = []; 
 
     
    public function mount()
    {
        $this->tags = Tag::whereHas('posts', function($query){
            $query->published();
        })->take(10)->get(); 
        $this->resentPosts = Post::latest()->take(4)->get(); 
    }

    public function render()
    {
        return view('livewire.main.post-show', ['post' => $this->post, 'latestPosts'=> $this->resentPosts]);
    }
}
