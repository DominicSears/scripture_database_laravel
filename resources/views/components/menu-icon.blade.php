<div @class([
    'w-full items-center p-2',
    'flex flex-row justify-between' => ! $singleItem,
    'text-slate-500' => ! $isSelected,
    'bg-sky-100 rounded-lg text-sky-500' => $isSelected
])>
    <div class="space-x-4 items-center flex flex-row">
        {{ $slot }}
    </div>
    @if (! $singleItem)
        <svg name="menu-extend" xmlns="http://www.w3.org/2000/svg" class="menu-extend h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    @endif
</div>
