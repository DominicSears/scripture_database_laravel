<div class="w-full flex flex-col items-center max-w-3xl relative">
    <!-- Search Bar -->
    <div class="w-full flex flex-row items-center">
        <!-- Search Icon and Text Field -->
        <div class="flex flex-row space-x-2 items-center bg-slate-200 rounded-tl-lg rounded-bl-lg w-11/12 py-2 pl-4">
            <!-- Search Icon -->
            <svg class="h-6 w-6 text-sky-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 22L20 20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <!-- Search Field -->
            <input type="text" wire:model.debounce.500ms="state.search"
                placeholder="Search for tags, doctrines, religions, denominations, etc..."
                class="text-gray-600 placeholder-gray-400 bg-slate-200 border-none flex-shrink-1 w-full focus:border-transparent focus:ring-0 focus:placeholder-transparent">
        </div>
        <button wire:click="search" class="px-2 py-4 h-full bg-sky-500 text-white rounded-tr-lg rounded-br-lg">
            <span class="text-sm p-2">Search</span>
        </button>
    </div>
    @if (! empty($state['search']))
        <!-- Results -->
        <div x-data @click.away="$el.remove()" style="margin-top: 4.5rem;" class="origin-center absolute w-full rounded-md bg-white ring-1 ring-slate-400 divide-y divide-slate-500 focus:outline-none py-2 space-y-4 oerflow-y-auto max-h-64" tab-index="1">
            <div class="flex flex-col space-between space-y-2">
                @if (! empty($searchResults))
                    <!-- Search Items -->
                    <div class="flex flex-col space-y-2">
                        @foreach ($searchResults as $result)
                            <div class="flex flex-row justify-between px-2">
                                <span class="text-md text-slate-500">
                                    {!! $result['link_title'] ?? $result['title'] !!}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <!-- Link for search page -->
                    <div class="flex flex-row items-center justify-end space-x-2 px-2 text-sky-500 hover:text-sky-700">
                        <a class="text-sm font-semibold" href="{{ route('search.results', ['q' => urlencode($state['search'])]) }}">
                            <span>See More</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                @else
                    <div class="flex justify-center items-center w-full h-full">
                        <p class="font-semibold text-md text-slate-500">No Results</p>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
