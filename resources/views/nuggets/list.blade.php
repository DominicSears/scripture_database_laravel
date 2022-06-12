<x-app-layout>
    <h1 class="font-bold text-2xl">Nuggets</h1>
    <div class="flex flex-col space-y-4 bg-white rounded-2xl shadow-2xl">
        @forelse ($nuggets as $nugget)
            <p>{{ $nugget->title }}</p>
            <p>{{ $nugget->explanation }}</p>
            <hr>
            @foreach ($nugget->availableNuggetableRelations() as $relation)
                <p>{{ ucfirst($nugget->nuggetType) }} for {{ $nugget->getRelation($relation)->implode('title', ', ') }}</p>
            @endforeach
        @empty
            <p>No nuggets available</p>
        @endforelse
    </div>
</x-app-layout>
