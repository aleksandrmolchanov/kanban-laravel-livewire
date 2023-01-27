<div>
    @switch($type)
        @case(1)
            <span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">Design</span>
            @break
        @case(2)
            <span class="flex items-center h-6 px-3 text-xs font-semibold text-yellow-500 bg-yellow-100 rounded-full">Copywriting</span>
            @break
        @case(3)
            <span class="flex items-center h-6 px-3 text-xs font-semibold text-green-500 bg-green-100 rounded-full">Dev</span>
            @break
        @default
            <span class="flex items-center h-6 px-3 text-xs font-semibold text-slate-500 bg-slate-200 rounded-full">Default</span>
    @endswitch
</div>
