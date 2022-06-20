<x-app-layout>
    <div class="flex flex-col space-y-8">
        <!-- Religion Info -->
        <div class="w-full p-8 bg-white rounded-2xl shadow-2xl flex flex-row justify-center items-center space-x-4">
            <div class="w-32 h-32 rounded-full bg-gray-300"></div>
            <div>{{ $religion->description ?? 'No description provided.' }}</div>
        </div>
        <!-- Religion's Denominations -->
        <div class="w-full p-8 bg-white rounded-2xl shadow-2xl">
            <livewire:religions.list-denominations :religion="$religion" />
        </div>
        @if ($religion->doctrines->isNotEmpty())
            <!-- Religion's Doctrines -->
            <div class="w-full p-8 bg-white rounded-2xl shadow-2xl flex flex-col space-y-4">
                <p class="text-4xl font-bold">Doctrines:</p>
                <livewire:doctrines.show-doctrines :className="$religion::class" :id="$religion->getKey()" :showChildren="false" />
            </div>
        @endif
    </div>
</x-app-layout>
