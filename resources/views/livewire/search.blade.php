<div class="w-full flex flex-col space-y-2 items-center max-w-3xl" x-data="{
    
}">
    <div class="w-full flex flex-row items-center">
        <!-- Search Icon and Text Field -->
        <div class="flex flex-row space-x-2 items-center bg-slate-100 rounded-tl-lg rounded-bl-lg w-11/12 py-2 pl-4">
            <!-- Search Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <!-- Search Field -->
            <input type="text" wire:model.debounce.500ms="state.search"
                placeholder="Search for tags, doctrines, religions, denominations, etc..."
                class="text-gray-600 placeholder-gray-400 bg-slate-100 border-none flex-shrink-1 w-full focus:border-transparent focus:ring-0 focus:placeholder-transparent">
        </div>
        <button wire:click="search" class="px-2 py-4 h-full bg-sky-500 text-white rounded-tr-lg rounded-br-lg">
            <span class="text-sm p-2">Search</span>
        </button>
    </div>
    @if (! empty($state['search']))
        <div class="relative inline-block w-full h-64 p-4 rounded-2xl shadow-2xl bg-white" x-on:click="$el.remove()">
            <div class="flex flex-col space-y-2">
                @forelse ($searchResults as $result)
                    <div class="flex flex-row justify-between px-2">
                        <p class="text-md text-slate-500">{{ $result['title'] }}</p>
                    </div>
                @empty
                    <div class="flex justify-center items-center w-full h-full">
                        <p class="font-semibold text-md text-slate-500">No Results (Click to remove)</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</div>
