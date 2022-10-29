<x-app-layout>
    <div class="pt-8 px-6 pb-12 space-y-4">
        <h1 class="font-bold text-2xl">Nuggets</h1>
        <div class="flex flex-col space-y-4 bg-white rounded-2xl shadow-2xl p-8">
            @forelse ($nuggets as $nugget)
                <p>{{ $nugget->title }}</p>
                <p>{{ $nugget->explanation }}</p>
                <hr>
                <span>
                @foreach ($nugget->nuggetTypeStatement($nugget->availableNuggetableRelations()) as $statement)
                        {!! $statement !!}
                    @endforeach
            </span>
            @empty
                <p>No nuggets available</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
