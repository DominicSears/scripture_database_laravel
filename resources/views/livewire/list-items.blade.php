<div class="flex flex-col space-y-4">
    <div class="flex flex-row space-x-4 justify-between items-center">
        <h2 class="font-bold text-2xl text-sky-900">{{ $title }}</h2>
        @if (isset($modalName))
            <button wire:click="$emit('openModal', '{{ $modalName }}', {{ json_encode($modalParams) }})">
                {!! $button ?? '+' !!}
            </button>
        @endif
    </div>
    @forelse ($items as $item)
        <div class="flex flex-row space-x-4 justify-between items-center">
            <a class="font-semibold text-xl text-black"
                href="{{ $item->getAttribute('url') }}">
                <span>{{ $item->getAttribute('title') }}</span>
            </a>
            @if ($item instanceof \App\Contracts\Approvable && (! $item->approved ?? false) && ! in_array($loop->index, $itemState['updated']))
                <div class="flex flex-row space-x-2">
                    <button class="px-4 py-2 text-white text-sm font-semibold bg-green-400 hover:bg-green-500 transition-all rounded-lg"
                            wire:click="approve({{ $loop->index }})">
                        <span>Approve</span>
                    </button>
                    <button class="px-4 py-2 text-white text-sm font-semibold bg-red-400 hover:bg-red-500 transition-all rounded-lg"
                            wire:click="delete({{ $loop->index }})">
                        <span>Delete</span>
                    </button>
                </div>
            @endif
        </div>
    @empty
        <div class="flex items-center justify-center">
            <span>No items available</span>
        </div>
    @endforelse

    @if ($items->count() > 10)
        <a href="#" class="text-lg font-semibold hover:underline text-sky-700 hover:text-sky-800">
            <span>See More</span>
        </a>
    @endif
</div>
