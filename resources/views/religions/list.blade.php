<x-app-layout>
    <div class="flex flex-col space-y-4 p-8 bg-white rounded-2xl">
        <p class="text-2xl font-bold">Religions: ({{ $religions->count() }})</p>
        @forelse ($religions as $religion)
            <a href="{{ route('religions.denominations', ['religion' => $religion->getKey()]) }}">
                {{ $religion->name . ($religion->approved ? '' : ' - (pending)') }}
            </a>
        @empty
            <p class="font-semibold text-md">There are not available religions</p>
        @endforelse
    </div>
</x-app-layout>