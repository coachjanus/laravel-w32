<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Computed, Url, On};
use App\Models\{Tag, Post};
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Blog Page')]
class BlogPage extends Component
{
    use WithPagination;

    public $tags;
    public $resentPosts;

    #[Url()]
    public $popular = false;

    #[Url()]
    public $search = '';

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $tag = '';

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters() {
        $this->search = '';
        $this->tag = '';
        $this->resetPage();
    }

    public function mount() {
        $this->tags = Tag::whereHas('posts', function($query) {
            $query->latest();
        })->take(10)->get();
        $this->resentPosts = Post::latest()->take(4)->get();
    }

    #[Computed()]
    public function activeTag() {
        if ($this->tag === null || $this->tag === '') {
            return null;
        }

        return Tag::where('slug', $this->tag)->first();
    }

    #[Computed()]
    public function posts() {
        return Post::latest()
                ->with('user', 'tags')
                ->when($this->activeTag, function($query){
                    $query->withTag($this->tag);
                })
                ->when($this->popular, function($query){
                    $query->popular();
                })
                ->search($this->search)
                ->orderBy('updated_at', $this->sort)
                ->paginate(3);
    }


    public function render()
    {
        return view('livewire.main.blog-page', [
            'resentPosts'=>$this->resentPosts, 'posts'=>$this->posts()
        ]);
    }
}
