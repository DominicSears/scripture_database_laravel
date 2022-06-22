<div @class([
    'w-full items-start p-2 rounded-lg transition',
    'flex flex-col hover:cursor-pointer' => ! $singleItem,
    'text-slate-500 hover:bg-sky-100 hover:text-sky-500' => ! $isSelected,
    'bg-sky-100 text-sky-500 hover:bg-sky-600 hover:text-white' => $isSelected
]) {{ $attributes }}>
    <div class="items-center flex flex-row justify-between w-full">
        <div class="flex flex-row space-x-4 items-center">
            {{ $slot }}
        </div>
        @if (! $singleItem)
            <svg name="menu-extend" xmlns="http://www.w3.org/2000/svg" class="menu-extend h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        @endif
    </div>
   @if (isset($children))
        <div {{ $children->attributes }} class="pt-4 w-full" x-cloak>
            <div class="flex flex-col space-y-4 justify-center w-full">
                {{ $children }}
            </div>
        </div>
   @endif
</div>
