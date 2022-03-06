<div class="flex flex-col space-y-4 p-8">
    <!-- Row 1 -->
    <div class="flex flex-row space-x-4 w-full">
        <!-- Name -->
        <div class="flex flex-col space-y-2 w-full">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model.defer="state.name">
        </div>
        <!-- Parent ID -->
        <div class="flex flex-col space-y-2 w-full">
            <label for="parent_id">Parent (If applicable)</label>
            <select id="parent_id" wire:model.defer="state.parent_id">
                @forelse ($religions as $religion)
                    <option value="" selected="">Not Applicable</option>
                    <option value="{{ $religion->getKey() }}">{{ $religion->name }}</option>
                @empty
                    <option disabled>No religions</option>
                @endforelse
            </select>
        </div>
    </div>
    <div>
        <x-jet-button wire:click="submit">
            <svg wire:loading wire:target="submit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Submit
        </x-jet-button>
    </div>
</div>
