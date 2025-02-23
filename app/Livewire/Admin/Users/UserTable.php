<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use Livewire\WithPagination;
use App\Models\{User};


#[Layout('layouts.app')]
#[Title('User List')]
class UserTable extends Component
{
    use WithPagination;

    public $title = "User list";
    public $sortByColumn = 'created_at';
    public $sortDirection = 'DESC';
    public $perPage = 5;
    public $search = "";

    public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    // #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.users.user-table', ['users'=>User::search($this->search)->orderBy($this->sortByColumn, $this->sortDirection)->paginate($this->perPage)]);
    }
}
