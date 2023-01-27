<x-modal form-action="delete">
    <x-slot name="title">
        Delete group «{{ $group->name }}»
    </x-slot>

    <x-slot name="content">
        <p>Are you sure you want to delete the group «{{ $group->name }}»?</p>
    </x-slot>

    <x-slot name="footer">
        <button class="focus:outline-none focus:ring-0 transition duration-150 ease-in-out hover:bg-red-500 bg-red-600 rounded text-white px-8 py-2 text-sm" type="submit">Delete</button>
        <button class="ml-2 focus:outline-none focus:ring-0 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:bg-gray-200 border rounded px-8 py-2 text-sm" wire:click.prevent="$emit('closeModal')">Cancel</button>
    </x-slot>
</x-modal>
