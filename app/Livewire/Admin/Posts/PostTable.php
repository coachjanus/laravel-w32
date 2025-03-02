<?php

namespace App\Livewire\Admin\Posts;

use Livewire\{Component};
use Livewire\Attributes\{Layout, Title};
use Livewire\WithPagination;
use App\Models\{Post};

#[Layout('layouts.admin')]
#[Title('Post List')]
class PostTable extends Component
{
    use WithPagination;
    public $title = "Post list";
    public $sortByColumn = 'created_at';
    public $sortDirection = 'DESC';
    public $perPage = 5;

    public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function deletePost($id) {
        $post = Post::find($id);
        $post->delete();
    }
    
    public function render()
    {
        return view('livewire.admin.posts.post-table', ['posts'=>Post::orderBy($this->sortByColumn, $this->sortDirection)->paginate($this->perPage)]);
    }
}
