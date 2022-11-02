@php use App\Models\Nugget @endphp

<div class="flex flex-col justify-between space-y-4 p-8">
    <div class="flex flex-col space-y-2">
        <h2 class="text-3xl text-sky-900 font-bold">{{ $itemTitle }}</h2>
        @if (isset($itemDescription))
            <p class="text-md text-gray-500">{{ $itemDescription }}</p>
        @endif
    </div>
    <div class="flex flex-col space-y-4">
        @forelse ($nuggets as $nugget)
            <div class="w-full p-8 bg-gray-400 rounded-xl">
                <p class="text-black font-semibold">{{ $nugget['title'] }}</p>
            </div>

        @empty
            <div class="w-full text-xl text-gray-500 text-center font-semibold">
                <span>There are no {{ Nugget::NUGGET_TYPES[$nuggetTypeId] ?? 'Unknown' }} nuggets</span>
            </div>
        @endforelse
    </div>
</div>
