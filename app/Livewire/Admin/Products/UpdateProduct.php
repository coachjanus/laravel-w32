<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Enums\ProductStatus;
use App\Livewire\Forms\ProductForm;
use App\Models\{Product, Category, Brand};
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Product')]
#[Layout('layouts.app')]
class UpdateProduct extends Component
{
    use WithFileUploads;
    public ProductForm $form; 
    public $productStatus;
    public $categories;
    public $brands;
    public $title = "Edit product";

    
    public function mount(Product $product)
	{
        $this->productStatus = ProductStatus::cases();
        $this->categories = Category::pluck('name', 'id' );
        $this->brands = Brand::pluck('name', 'id' );
    	$this->form->setProduct($product);
	}
 
	public function save()
	{
    	$this->form->update();
     	return $this->redirect('/admin/products');
	}

    public function render()
    {
        return view('livewire.admin.products.update-product');
    }
}
