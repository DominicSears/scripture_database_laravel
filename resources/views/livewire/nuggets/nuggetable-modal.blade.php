<div class="flex flex-col justify-between space-y-2 p-8">
    <div class="flex flex-col space-y-2">
        <h2 class="text-3xl text-sky-900 font-bold">{{ $itemTitle }}</h2>
        @if (isset($itemDescription))
            <p class="text-md text-gray-500">{{ $itemDescription }}</p>
        @endif
    </div>
    <div class="flex flex-col space-y-4">
        @foreach ($nuggets as $nugget)
            <div class="w-full p-8 bg-gray-400 rounded-xl">
                <p class="text-black font-semibold">{{ $nugget['title'] }}</p>
            </div>
        @endforeach
    </div>
</div>
