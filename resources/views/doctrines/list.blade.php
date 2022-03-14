<x-app-layout>
    <x-slot name="header">Show Doctrines</x-slot>
    <div class="flex flex-col w-full bg-white rounded-2xl shadow-2xl p-8 space-y-4">
        @foreach ($religions as $religion)
            @if ($religion->doctrines->isNotEmpty())
                <livewire:doctrines.show-doctrines :entity="$religion" />
            @endif
        @endforeach
    </div>
</x-app-layout>