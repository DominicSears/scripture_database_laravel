<div class="flex flex-col space-y-4">
    <div class="flex flex-row space-x-4">
        <p class="text-4xl font-semibold">Edit Faith</p>
        <x-jet-button wire:click="newFaith">
            <svg wire:loading wire:target="newFaith" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            + New Faith
        </x-jet-button>
    </div>
    <div class="w-full h-auto p-8 bg-white rounded-2xl shadow-xl flex flex-row space-x-4">
    <!-- Column 1 -->
    <div class="flex flex-col w-full space-y-2">
        <x-jet-label for="religion_id">{{ __('Religion') }}</x-jet-label>
        <select id="religion_id" wire:model="state.religion_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
            @foreach ($religions as $religion)
                <option value="{{ $religion->getKey() }}">
                    {{ $religion->name }}
                </option>
            @endforeach
        </select>
        <x-jet-label for="start_of_faith">{{ __('Start of Faith') }}</x-jet-label>
        <x-jet-input id="start_of_faith" wire:model.defer="state.start_of_faith" type="text" value="{{ $state['start_of_faith'] }}" />
    </div>
    <!-- Column 2 -->
    <div class="flex flex-col w-full space-y-2">
        <x-jet-label for="denomination_id">{{ __('Denomination') }}</x-jet-label>
        <select id="denomination_id" wire:model.defer="state.denomination_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
            @foreach ($denominations ?? [] as $denomination)
                <option value="{{ $denomination->getKey() }}">
                    {{ $denomination->name }}
                </option>
            @endforeach
        </select>
        <x-jet-label for="note">{{ __('Note') }}</x-jet-label>
        <x-jet-input type="text" id="note" wire:model.defer="note" value="{{ $state['note'] }}" />
    </div>
</div>
