<x-modal form-action="add">
    <x-slot name="title">
        Add a card
    </x-slot>

    <x-slot name="content">
        <div>
            <label for="card-name" class="block text-sm font-medium text-gray-700">Card name</label>
            <input wire:model="name" wire:keydown.enter="add" type="text" name="card-name" id="card-name" autocomplete="given-name" class="mt-1 block w-full px-2 h-10 text-sm rounded-md border border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
            @error('name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <span class="block text-sm font-medium text-gray-700">Card type</span>
            <div class="mt-2 flex flex-col gap-2">
                <div class="flex items-center">
                    <input wire:model="type" value="0" id="type-default" name="card-type" type="radio" class="h-4 w-4 border-gray-300 text-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    <label for="type-default" class="ml-1 flex items-center h-6 px-3 text-xs font-semibold text-slate-500 bg-slate-200 rounded-full">Default</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="type" value="1" id="type-design" name="card-type" type="radio" class="h-4 w-4 border-gray-300 text-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    <label for="type-design" class="ml-1 flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">Design</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="type" value="2" id="type-copywriting" name="card-type" type="radio" class="h-4 w-4 border-gray-300 text-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    <label for="type-copywriting" class="ml-1 flex items-center h-6 px-3 text-xs font-semibold text-yellow-500 bg-yellow-100 rounded-full">Copywriting</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="type" value="3" id="type-dev" name="card-type" type="radio" class="h-4 w-4 border-gray-300 text-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    <label for="type-dev" class="ml-1 flex items-center h-6 px-3 text-xs font-semibold text-green-500 bg-green-100 rounded-full">Dev</label>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <button class="focus:outline-none focus:ring-0 transition duration-150 ease-in-out hover:bg-purple-500 bg-purple-600 rounded text-white px-8 py-2 text-sm" type="submit">Add</button>
        <button class="ml-2 focus:outline-none focus:ring-0 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:bg-gray-200 border rounded px-8 py-2 text-sm" wire:click.prevent="$emit('closeModal')">Cancel</button>
    </x-slot>
</x-modal>
