<x-app-layout>
    <div class="flex flex-col space-y-8">
        <div class="w-full p-8 bg-white rounded-2xl shadow-2xl">
            <livewire:religions.list-denominations :religion="$religion" />
        </div>
        @if ($religion->doctrines->isNotEmpty())
            <div class="w-full p-8 bg-white rounded-2xl shadow-2xl flex flex-col space-y-4">
                <p class="text-4xl font-bold">Doctrines:</p>
                <livewire:doctrines.show-doctrines :className="$religion::class" :id="$religion->getKey()" :showChildren="false" />
            </div>
        @endif
    </div>
</x-app-layout>
