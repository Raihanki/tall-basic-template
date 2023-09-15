<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Livewire\Product\Index as ProductIndex;
use Livewire\Component;

class Create extends Component
{
    public ProductForm $form;

    public bool $modalCreateProduct = false;

    public function create()
    {
        $this->form->store();
        $this->dispatch('product-created')->to(ProductIndex::class);
        $this->modalCreateProduct = false;

        $this->dispatch('show-alert', [
            "type" => "success",
            "title" => "Success",
            "description" => "Product Successfully Created"
        ]);
    }

    public function updatedModalCreateProduct()
    {
        $this->form->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
