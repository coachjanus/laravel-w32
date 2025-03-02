<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\{Tag, Post};
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

#[Layout('layouts.app')]
#[Title('Home Page')]
class HomePage extends Component
{
    public $latestPosts;

    public function mount() {
        $this->latestPosts = Cache::remember('latestPosts', now()->addDay(), function(){
            return Post::latest('updated_at')->with('tags')->take(4)->get();
        });
    }
    public function render()
    {
        return view('livewire.main.home-page');
    }
}
