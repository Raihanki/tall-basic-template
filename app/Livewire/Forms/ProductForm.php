<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    public ?string $name;
    public ?string $description;
    public ?int $stock;

    public function setProduct(Product $product)
    {
        $this->product = $product;

        $this->name = $product->name;
        $this->description = $product->description;
        $this->stock = $product->stock;
    }

    public function store()
    {
        $data = $this->validate();
        $data['slug'] = str($data['name'])->slug();
        $product = Product::create($data);
        $this->reset();
        return $product;
    }

    public function update()
    {
        $data = $this->validate();
        $data['slug'] = str($data['name'])->slug();
        $this->product->update($data);
        $this->reset();
        return $this->product;
    }

    public function rules()
    {
        return [
            "name" => "required|string|min:2|max:255",
            "description" => "required|string",
            "stock" => "required|numeric|min:1"
        ];
    }
}
