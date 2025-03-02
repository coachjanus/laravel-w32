<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\Attributes\{Layout, Title, Computed, Rule, On};
use App\Models\{Tag, Post};
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Post Comments')]
class PostComments extends Component
{
    use WithPagination;

    public Post $post;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function postComment() {
        if (auth()->guest()) {
            return;
        }

        $this->validateOnly('comment');
        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id'=>auth()->id()
        ]);
        $this->reset('comment');
    }

    #[Computed()]
    public function comments() {
        return $this?->post?->comments()->with('user')->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.main.post-comments');
    }
}
