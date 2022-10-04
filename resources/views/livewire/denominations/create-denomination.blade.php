<div class="w-full h-auto p-8 bg-white flex flex-col space-y-4">
    @if (! empty($message))
        <div id="alert-create-denomination" x-data @class([
            'ring-1 p-4 rounded-xl font-bold flex flex-row justify-between space-x-4 items-center w-full',
            'bg-red-400 ring-red-500 text-red-700' => $alertType === 'danger',
            'bg-green-400 ring-green-500 text-green-700' => $alertType === 'success'
        ])>
            <span>{{ $message ?? 'This is a message for the alert' }}</span>
            <span x-on:click="$el.parentElement.style.display = 'none'" class="hover:cursor-pointer">x</span>
        </div>
    @endif
    <p class="font-bold text-3xl">Add denomination to: {{ $religion->name }}</p>
    <div class="flex flex-row space-x-4 w-full">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-4 w-full">
            <div class="flex flex-col space-y-2">
                <label for="name">Name</label>
                <input type="text" id="name" wire:model.defer="state.name" />
            </div>
            <div class="flex flex-col space-y-2 w-full">
                <label for="parent">Parent ID (If applicable)</label>
                <select id="parent" wire:model.defer="state.parent_id">
                    @if ($religion?->denominations?->isNotEmpty() ?? false)
                        <option selected value>None</option>
                        @foreach ($religion->denominations as $denomination)
                            <option value="{{ $denomination->getKey() }}">{{ $denomination->name }}</option>
                        @endforeach
                    @else
                        <option disabled>No denominations</option>
                    @endif
                </select>
            </div>
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-4 w-full">
            <div class="flex flex-col space-y-2 w-full">
                <label for="religion">Religion</label>
                <select id="religion" wire:model="state.religion_id">
                    @forelse ($religions as $religion)
                        <option value="{{ $religion->getKey() }}">{{ $religion->name }}</option>
                    @empty
                        <option disabled>No Religions</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-2 w-full">
        <label for="description">Description</label>
        <textarea wire:model.defer="state.description" rows="5" id="description"></textarea>
    </div>
    <div class="w-full">
        <x-jet-button wire:click="submit">
            <svg wire:loading wire:target="submit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Submit
        </x-jet-button>
    </div>
</div>
