<div class="flex flex-col space-y-4">
    <!-- Feed filters -->
    <div class="flex flex-row space-x-2 p-2 bg-sky-100 rounded-xl w-fit">
        <button wire:click="filter('browse_all')" @class([
            'text-sky-300 rounded-lg px-4',
            'hover:bg-sky-50' => ! $filter['browse_all'],
            'bg-white text-sky-400 hover:bg-sky-200 font-bold' => $filter['browse_all']
        ])>
            Browse All
        </button>
        <button wire:click="filter('recent')" @class([
            'text-sky-300 rounded-lg py-2 px-4',
            'hover:bg-sky-50' => ! $filter['recent'],
            'bg-white text-sky-400 hover:bg-sky-200 font-bold' => $filter['recent']
        ])>
            Recent
        </button>
        <button wire:click="filter('following')" @class([
            'text-sky-300 rounded-lg py-2 px-4',
            'hover:bg-sky-50' => ! $filter['following'],
            'bg-white text-sky-400 hover:bg-sky-200 font-bold' => $filter['following']
        ])>
            Following
        </button>
    </div>
    <div class="flex flex-col space-y-6 pb-6">
        <!-- Feed Items -->
        @forelse ($feedItems as $item)
            <div class="w-full h-auto border border-gray-300 rounded-xl flex flex-col p-8 space-y-4">
                <!-- Header -->
                <div class="flex flex-col space-y-2">
                    <p class="font-semibold text-2xl text-sky-500">{{ $item['title'] }}</p>
                    <small class="font-thin text-sm text-sky-400">Created By: {{ $item['created_by'] }} - {{ $item['created_at']->diffForHumans() }}</small>
                    <small class="font-thin text-sm text-sky-400">Type: {{ $item['type'] }}</small>
                </div>
                <!-- Body -->
                <div>
                     <p class="text-slate-500">{{ $item['content'] }}</p>
                </div>
                <!-- Footer -->
                <div class="flex flex-row space-x-4 items-center">
                    <!-- Votes -->
                    <livewire:item-votes :votable="$item" />
                    <!-- Comments -->
                    <div class="flex flex-row space-x-2">
                        <!-- Comment icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span class="text-slate-500">{{ $item['comments_number'] }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full h-96 border border-gray-300 rounded-xl flex justify-center items-center">
                <p class="font-bold text-xl text-sky-500">No Feed Items Available.</p>
            </div>
        @endforelse
    </div>
</div>
