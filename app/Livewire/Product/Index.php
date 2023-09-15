<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Traits\WithSortingTable;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSortingTable;

    public $search;
    public $limit = 10;
    public $sortBy = "products.id";
    public $sortDirection = 'desc';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $this->dispatch('product-deleted');

        $this->dispatch('show-alert', [
            "type" => "success",
            "title" => "Success",
            "description" => "Product Successfully Deleted"
        ]);
    }

    #[On('product-created')]
    #[On('product-updated')]
    #[On('product-deleted')]
    public function render()
    {
        $products = Product::query()
            ->where(function ($q) {
                return $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->limit);
        return view('livewire.product.index', [
            "products" => $products
        ]);
    }
}
