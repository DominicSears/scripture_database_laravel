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
    <div class="flex flex-col space-y-12 pb-6">
        <!-- Feed Items -->
        @forelse ($feedItems as $item)
            <div class="w-full h-auto bg-white rounded-2xl flex flex-col p-6 space-y-4">
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
                    <livewire:item-comments :commentable="$item" />
                </div>
            </div>
        @empty
            <div class="w-full h-96 border border-gray-300 rounded-xl flex justify-center items-center">
                <p class="font-bold text-xl text-sky-500">No Feed Items Available.</p>
            </div>
        @endforelse
    </div>
</div>
