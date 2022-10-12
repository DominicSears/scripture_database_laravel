<x-app-layout>
    <x-slot name="header">Show Doctrines</x-slot>
    <div class="flex flex-row space-x-6 w-full overflow-y-auto pb-8">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-6 w-4/5">
            @if ($empty)
                <div class="bg-white w-full rounded-2xl shadow-2xl h-64 items-cetner justify-center">
                    <p class="text-2xl font-semibold text-center">No doctrines available</p>
                </div>
            @else
                @foreach ($religions as $religion)
                    <div class="flex flex-col w-full h-fit p-8 bg-white rounded-2xl shadow-2xl">
                        <livewire:doctrines.show-doctrines :entity="$religion" />
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-6 w-1/5">
            <div class="flex flex-col space-y-2 p-4 rounded-2xl shadow-2xl h-64 bg-white">
                <h2 class="text-2xl text-sky-900 font-bold">Popular Doctrines</h2>
            </div>
            <div class="flex flex-col space-y-2 p-4 rounded-2xl shadow-2xl h-64 bg-white">
                <h2 class="text-2xl text-sky-900 font-bold">Latest Doctrines</h2>
            </div>
        </div>
    </div>
</x-app-layout>
