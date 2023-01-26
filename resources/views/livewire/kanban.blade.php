<div class="flex flex-col w-screen h-screen overflow-auto text-gray-700 bg-gradient-to-tr from-blue-200 via-indigo-200 to-pink-200">
    <div class="px-10 mt-6">
        <h1 class="text-2xl font-bold">Kanban Laravel Livewire</h1>
    </div>
    <div class="px-10 mt-6 flex justify-between gap-2">
        <a wire:click.prevent="$emit('openModal', 'add-group')" href="#" class="flex items-center w-fit p-2 bg-white text-sm font-medium rounded-lg bg-opacity-90 hover:bg-opacity-100">
            <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add a group
        </a>
        @if (session()->has('message'))
            <div x-data="{}" x-init="setTimeout(() => { $wire.clearMessage() }, 5000);" wire:click="clearMessage" class="w-fit p-2 bg-emerald-400 text-white text-sm font-medium rounded-lg cursor-pointer">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div wire:sortable="updateGroupOrder" wire:sortable-group="updateCardOrder" class="flex flex-grow px-10 mt-4 space-x-6 overflow-auto">
        @foreach($groups as $group)
        <div wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}" class="flex flex-col flex-shrink-0 w-72">
            <div class="flex items-center flex-shrink-0 h-10 px-2">
                <span wire:sortable.handle class="block text-sm font-semibold cursor-pointer">{{ $group->name }}</span>
                <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">{{ $group->cards->count() }}</span>
                <div class="flex flex-row ml-auto gap-x-2">
                    <button wire:click="$emit('openModal', 'add-card', {{ json_encode(["group_id" => $group->id]) }})" class="flex items-center justify-center w-6 h-6 text-indigo-500 rounded hover:bg-indigo-500 hover:text-indigo-100">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <button wire:click="$emit('openModal', 'edit-group', {{ json_encode(["id" => $group->id]) }})" class="flex items-center justify-center w-6 h-6 text-indigo-800 rounded hover:bg-indigo-700 hover:text-indigo-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </button>
                    <button wire:click="$emit('openModal', 'delete-group', {{ json_encode(["id" => $group->id]) }})" class="flex items-center justify-center w-6 h-6 text-red-700 rounded hover:bg-red-700 hover:text-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <div wire:sortable-group.item-group="{{ $group->id }}" class="flex flex-col pb-2 overflow-auto">

                @foreach($group->cards as $card)
                <div wire:key="task-{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}" class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 w-72" draggable="true">
                    <button wire:click="$emit('openModal', 'edit-card', {{ json_encode(["id" => $card->id]) }})"  wire:mousedown="$emit('openModal', 'edit-card', {{ json_encode(["id" => $card->id]) }})" class="absolute top-0 right-[24px] flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-indigo-800 rounded hover:bg-indigo-100 hover:text-indigo-700 group-hover:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[1.1rem] h-[1.1rem]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </button>
                    <button wire:click="$emit('openModal', 'delete-card', {{ json_encode(["id" => $card->id]) }})" wire:mousedown="$emit('openModal', 'delete-card', {{ json_encode(["id" => $card->id]) }})" class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-red-700 rounded hover:bg-red-200 hover:text-red-800 group-hover:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                    <span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">Design</span>
                    <h4 class="mt-3 text-sm font-medium">{{ $card->name }}</h4>
                    <div class="flex items-center justify-between w-full mt-3 text-xs font-medium text-gray-400">
                        <div class="flex items-center gap-x-1">
                            <div>Updated</div>
                            <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span class="leading-none">{{ $card->updated_at->format('M j, Y, g:i a') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

        <div class="flex-shrink-0 w-6"></div>
    </div>
</div>


