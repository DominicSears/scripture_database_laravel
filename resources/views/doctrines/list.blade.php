<x-app-layout>
    <x-slot name="header">Show Doctrines</x-slot>
    <div class="flex flex-col w-full bg-white rounded-2xl shadow-2xl p-8 space-y-4">
        @if ($empty)
            <p class="text-2xl font-semibold text-center">No doctrines available</p>
        @else
            @foreach ($religions as $religion)
                <livewire:doctrines.show-doctrines :entity="$religion" />
            @endforeach
        @endif
    </div>
</x-app-layout>
