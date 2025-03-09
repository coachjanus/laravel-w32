<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Post;
use App\Enums\PostStatus;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

#[Title('Home page')]
#[Layout('layouts.app')]
class HomePage extends Component
{
    public $latestPosts;
 
    public function mount() 
    {
        $this->latestPosts = Cache::remember('latestPosts', now()->addDay(), function () {
            return Post::latest('updated_at')->with('tags')->take(3)->get();
        });
    }
    public function render()
    {
        return view('livewire.main.home-page');
    }
}
