<div class="w-full h-auto p-8 bg-white rounded-2xl shadow-xl flex flex-col space-y-8">
    <div class="w-full h-auto flex flex-row space-x-4">
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
            <x-jet-input id="start_of_faith" wire:model.defer="start_of_faith" type="text" value="{{ $state['start_of_faith'] }}" />
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col w-full space-y-2">
            <x-jet-label for="denomination_id">{{ __('Denomination') }}</x-jet-label>
            <select id="denomination_id" wire:model.defer="state.denomination_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                @forelse ($denominations ?? [] as $denomination)
                    <option value="{{ $denomination->getKey() }}">
                        {{ $denomination->name }}
                    </option>
                @empty
                    <option disabled></option>
                @endforelse
            </select>
            <x-jet-label for="note">{{ __('Note') }}</x-jet-label>
            <x-jet-input type="text" id="note" wire:model.defer="note" value="{{ $state['note'] }}" />
        </div>
    </div>
    <p class="font-semibold text-2xl">Previous Faith Fields</p>
    <div class="flex flex-row space-x-4">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-2"></div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-2"></div>
    </div>
    <div class="flex flex-row space-x-2">
        <button class="space-x-4 space-y-1 font-semibold bg-white hover:ring-1 hover:ring-gray-300 cursor-pointer">Cancel</button>
        <button class="space-x-4 space-y-1 font-semibold hover:bg-gray-800 bg-gray-700 text-white cursor-pointer">Submit</button>
    </div>
</div>