<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

use App\Models\{Post, Tag};
use App\Enums\PostStatus;
use Livewire\WithPagination;

use Livewire\Attributes\Computed;
// use Illuminate\Database\Eloquent\Builder;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;

#[Title('Blog page')]
#[Layout('layouts.app')]
class BlogPage extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $tag = '';

    #[Url()]
    public $popular = false;

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public $tags = [];

    public $resentPosts = []; 

     
    public function mount()
    {
        $this->tags = Tag::whereHas('posts', function($query){
            $query->latest();
        })->take(10)->get(); 
        $this->resentPosts = Post::latest()->take(4)->get(); 
    }
 
    public function clearFilters()
    {
        $this->search = '';
        $this->tag = '';
        $this->resetPage();
    }

    #[Computed()]
    public function posts()
    {
        return Post::latest()
            ->with('user', 'tags')
            ->when($this->activeTag, function ($query) {
                $query->withTag($this->tag);
            })
            ->when($this->popular, function ($query) {
                $query->popular();
            })
            ->search($this->search)
            ->orderBy('updated_at', $this->sort)
            ->paginate(3);
    }

    #[Computed()]
    public function activeTag()
    {
        if ($this->tag === null || $this->tag === '') {
            return null;
        }

        return Tag::where('slug', $this->tag)->first();
    }

    public function render()
    {
        return view('livewire.main.blog-page', ['posts'=>$this->posts(), 'resentPosts'=> $this->resentPosts
    ]);
    }
}
