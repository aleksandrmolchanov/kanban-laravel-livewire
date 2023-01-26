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
        <div class="flex items-center justify-between w-full mt-3 text-xs font-medium text-gray-400">
            <div class="flex items-center gap-x-1">
                <div>Created</div>
                <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <span class="leading-none">{{ $card->created_at->format('M j, Y, g:i a') }}</span>
            </div>
            <div class="flex items-center gap-x-1">
                <div>Updated</div>
                <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <span class="leading-none">{{ $card->updated_at->format('M j, Y, g:i a') }}</span>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <button class="focus:outline-none focus:ring-0 transition duration-150 ease-in-out hover:bg-purple-500 bg-purple-600 rounded text-white px-8 py-2 text-sm" type="submit">Update</button>
        <button class="ml-2 focus:outline-none focus:ring-0 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:bg-gray-200 border rounded px-8 py-2 text-sm" wire:click.prevent="$emit('closeModal')">Cancel</button>
    </x-slot>
</x-modal>
