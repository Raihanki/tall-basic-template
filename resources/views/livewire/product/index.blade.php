<div>
    <div class="py-12 mx-6 md:mx-10 lg:mx-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-4xl font-medium">Product List</h1>
                    <span class="text-gray-600 text-sm">Table list of product</span>
                </div>
                <div>
                    @livewire('product.create')
                </div>
            </div>
            <div class="text-right">
                <x-input wire:model.live.debounce.150ms='search' class="w-1/2 md:w-1/3 lg:w-1/4" placeholder="Search Product ..." />
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-lg">
                            <table class="min-w-full text-center text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr class="">
                                    <th class="px-6 py-4 dark:border-neutral-500 bg-gray-300" x-on:click="$wire.sortField('id')">
                                        <x-sort-icon :$sortBy :$sortDirection field='id' />#
                                    </th>
                                    <th  class="px-6 py-4 dark:border-neutral-500 bg-gray-300" x-on:click="$wire.sortField('name')">
                                        <x-sort-icon :$sortBy :$sortDirection field='name' />Name
                                    </th>
                                    <th class="px-6 py-4 dark:border-neutral-500 bg-gray-300" x-on:click="$wire.sortField('stock')">
                                        <x-sort-icon :$sortBy :$sortDirection field='stock' />Stock
                                    </th>
                                    <th class="px-6 py-4 dark:border-neutral-500 bg-gray-300">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $index => $product)
                                    <tr class="border-b dark:border-neutral-500" wire:key="{{ $index }}">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            {{ $index + $products->firstItem() }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $product->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $product->stock }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 flex items-center justify-center gap-x-3">
                                            <svg wire:click="$dispatch('show-confirm-alert', { data: '{{ $product->slug }}' })" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer hover:text-gray-600">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            <svg x-on:click="$dispatch('edit-product', { product: '{{ $product->slug }}'})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer hover:text-gray-600">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
    @livewire('product.edit')
    <x-confirm-sweetalert />
</div>
