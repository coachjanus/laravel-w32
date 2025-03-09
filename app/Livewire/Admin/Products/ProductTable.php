<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Product list')]
#[Layout('layouts.admin')]
class ProductTable extends Component
{
    use WithPagination;
    public $perPage = 7;
    public $search = '';
    public $sortByColumn = 'created_at';
    public $sortDirection = 'DESC';
    public $title = 'Product List...';

    public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function query() : Builder
    {
        return Product::query();
    }
  
   public function deleteProduct($id)
   {
       $product = Product::find($id);
       $product->delete();
   }
    
    public function render()
    {
        return view('livewire.admin.products.product-table',[
            'products' => Product::search($this->search)
            ->orderBy($this->sortByColumn,$this->sortDirection)
            ->paginate($this->perPage)
        ]);
    }
    
}
