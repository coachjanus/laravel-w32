<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;

use Livewire\Attributes\{Layout, Title};
use Livewire\WithPagination;
use App\Models\{Product};

#[Layout('layouts.admin')]
#[Title('Product List')]
class ProductTable extends Component
{
    use WithPagination;

    public $title = "Product list";
    public $sortByColumn = 'created_at';
    public $sortDirection = 'DESC';
    public $perPage = 5;
    public $search = '';

    public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
    }


    public function render()
    {
        return view('livewire.admin.products.product-table', ['products'=>Product::search($this->search)->orderBy($this->sortByColumn, $this->sortDirection)->paginate($this->perPage)]);
    }
}
