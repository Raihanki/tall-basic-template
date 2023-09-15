<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Livewire\Product\Index as ProductIndex;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    public ProductForm $form;

    public bool $modalUpdateProduct = false;

    public function edit()
    {
        $this->form->update();
        $this->dispatch('product-updated')->to(ProductIndex::class);
        $this->modalUpdateProduct = false;

        $this->dispatch('show-alert', [
            "type" => "success",
            "title" => "Success",
            "description" => "Product Successfully Updated"
        ]);
    }

    #[On('edit-product')]
    public function setProduct(Product $product)
    {
        $this->form->setProduct($product);
        $this->modalUpdateProduct = true;
    }

    public function updatedModalUpdateProduct()
    {
        $this->form->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
