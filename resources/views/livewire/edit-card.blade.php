<x-modal form-action="update">
    <x-slot name="title">
        Edit card «{{ $cardName }}»
    </x-slot>

    <x-slot name="content">
        <div>
            <label for="card-name" class="block text-sm font-medium text-gray-700">Card name</label>
            <input wire:model="card.name" wire:keydown.enter="update" type="text" name="card-name" id="card-name" autocomplete="given-name" class="mt-1 block w-full px-2 h-10 text-sm rounded-md border border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
            @error('card.name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <button class="focus:outline-none focus:ring-0 transition duration-150 ease-in-out hover:bg-purple-500 bg-purple-600 rounded text-white px-8 py-2 text-sm" type="submit">Update</button>
        <button class="ml-2 focus:outline-none focus:ring-0 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:bg-gray-200 border rounded px-8 py-2 text-sm" wire:click.prevent="$emit('closeModal')">Cancel</button>
    </x-slot>
</x-modal>
