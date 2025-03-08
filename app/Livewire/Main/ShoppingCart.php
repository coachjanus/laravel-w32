<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\Attributes\{Layout, Title};

#[Layout('layouts.app')]
#[Title('Shopping Cart')]
class ShoppingCart extends Component
{    
    public $cartItems = [];

    public $tax = .07;


    public function mount() {
        $this->cartItems = \Cart::getContent()->toArray();
    }

    public function render()
    {
        return view('livewire.main.shopping-cart');
    }
}
