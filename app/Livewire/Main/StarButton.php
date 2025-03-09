<?php

namespace App\Livewire\Main;

use Livewire\Component;

use App\Models\Product;

class StarButton extends Component
{

    public Product $product;


    public function toggleStar()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasStars($this->product)) {
            $user->stars()->detach($this->product);
            return;
        }

        $user->stars()->attach($this->product);
    }
    public function render()
    {
        return view('livewire.main.star-button');
    }
}
