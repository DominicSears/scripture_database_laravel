<div class="flex flex-col space-y-4">
    <!-- Feed filters -->
    <div class="flex flex-row space-x-2">
        <button wire:click="filter('browse_all')" @class([
            'text-sky-500 rounded-lg px-4',
            'hover:bg-sky-50' => ! $filter['browse_all'],
            'bg-sky-100 hover:bg-sky-200' => $filter['browse_all']
        ])>
            Browse All
        </button>
        <button wire:click="filter('recent')" @class([
            'text-sky-500 rounded-lg py-2 px-4',
            'hover:bg-sky-50' => ! $filter['recent'],
            'bg-sky-100 hover:bg-sky-200' => $filter['recent']
        ])>
            Recent
        </button>
        <button wire:click="filter('following')" @class([
            'text-sky-500 rounded-lg py-2 px-4',
            'hover:bg-sky-50' => ! $filter['following'],
            'bg-sky-100 hover:bg-sky-200' => $filter['following']
        ])>
            Following
        </button>
    </div>
    <div class="flex flex-col space-y-6 pb-6">
        @for ($i = 0; $i < 5; $i++)
            <div class="w-full h-96 border border-gray-300 rounded-xl"></div>
        @endfor
    </div>
</div>
