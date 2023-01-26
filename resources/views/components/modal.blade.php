@props(['formAction' => false])
<div>
    @if($formAction)
        <form wire:submit.prevent="{{ $formAction }}" onkeydown="return event.key != 'Enter';">
            @endif
            <div class="bg-white p-4 sm:px-4 sm:py-4 border-b border-gray-150 flex justify-between">
                <div>
                    @if(isset($title))
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $title }}
                        </h3>
                    @endif
                </div>
                <button wire:click.prevent="$emit('closeModal')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="bg-white px-4 sm:py-6">
                <div class="space-y-6">
                    {{ $content }}
                </div>
            </div>
            <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
                {{ $footer }}
            </div>
            @if($formAction)
        </form>
    @endif
</div>
