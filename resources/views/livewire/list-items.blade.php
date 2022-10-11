<div class="flex flex-col space-y-4">
    <div class="flex flex-row space-x-4 justify-between items-center">
        <h2 class="font-bold text-2xl text-sky-900">{{ $title }}</h2>
        <button>
            +
        </button>
    </div>
    @forelse ($items as $item)
        <div class="flex flex-row space-x-4 justify-between items-center">
            <a class="font-semibold text-xl text-black"
                href="{{ $item->getAttribute('url') }}">
                <span>{{ $item->getAttribute('title') }}</span>
            </a>
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
