<x-app-layout>
    <x-slot name="header">Show Doctrines</x-slot>
    <div class="flex flex-col w-full bg-white rounded-2xl shadow-2xl p-8 space-y-4">
        @foreach ($religions as $religion)
            @if ($religion->doctrine->isNotEmpty())
                <p class="text-lg font-bold">{{ $religion->name }}</p>
                @foreach ($religion->doctrine as $doctrine)
                    <p class="text-md font-semibold text-blue-400">
                        Title: {{ $doctrine->title }}<br>
                        Description: {{ $doctrine->description }}
                    </p>
                @endforeach
                <hr>
            @endif
        @endforeach
    </div>
</x-app-layout>