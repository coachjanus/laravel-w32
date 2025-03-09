<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Product List')]
class ProductList extends Component
{
    public $title = 'Manage product List...';

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.products.product-list');
    }
}
