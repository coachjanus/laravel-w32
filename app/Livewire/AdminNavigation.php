<?php

namespace App\Livewire;

use Laravel\Jetstream\Http\Livewire\NavigationMenu;

class AdminNavigation extends NavigationMenu
{
    public function render()
    {
        return view('livewire.admin-navigation');
    }
}
