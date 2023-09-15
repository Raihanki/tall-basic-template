<div>
    <x-button x-on:click="$wire.set('modalCreateProduct', true)">Create New Product</x-button>

    <x-dialog-modal wire:model.live="modalCreateProduct" submit="create">
        <x-slot name="title">
            <span class="text-2xl font-medium">Create New Product</span>
        </x-slot>

        <x-slot name="content">
            <div class="mt-5">
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input wire:model='form.name' id="name" class="block mt-1 w-full" type="text" autofocus />
                    <x-input-error for="form.name" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="description" value="{{ __('Description') }}" />
                    <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model='form.description' id="description" class="block mt-1 w-full" type="text"></textarea>
                    <x-input-error for="form.description" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="stock" value="{{ __('Stock') }}" />
                    <x-input wire:model='form.stock' id="stock" class="block mt-1 w-full" type="number" min="0" autofocus />
                    <x-input-error for="form.stock" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button x-on:click="$wire.set('modalCreateProduct', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" type="submit" wire:loading.attr="disabled">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
