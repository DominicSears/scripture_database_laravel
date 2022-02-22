<div class="w-full h-auto p-8 bg-white rounded-2xl shadow-xl flex flex-col space-y-4">
    <p class="font-bold text-3xl">Edit denomination from: {{ $religionName }}</p>
    <!-- Column 1 -->
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model.defer="state.name" />
        </div>
    </div>
    <!-- Column 2 -->
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <label for="parent">Parent ID (If applicable)</label>
            <select id="parent" wire:model.defer="state.parent_id">
                <option value="" selected>Not Applicable</option>
                @foreach ($religion->denominations as $denomination)
                    <option value="{{ $denomination->getKey() }}">{{ $denomination->name }}</option>
                @endforeach
            </select>
        </div>
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
