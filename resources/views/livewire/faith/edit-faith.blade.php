<div class="flex flex-col space-y-4">
    <div class="flex flex-row space-x-4">
        <p class="text-4xl font-semibold">Edit Faith</p>
        <x-jet-button wire:click="$emit('openModal', 'faith.new-faith')">+ New Faith</x-jet-button>
    </div>
    <div class="w-full h-auto p-8 bg-white rounded-2xl shadow-xl flex flex-row space-x-4">
    <!-- Column 1 -->
    <div class="flex flex-col w-full space-y-2">
        <x-jet-label for="religion_id">{{ __('Religion') }}</x-jet-label>
        <select id="religion_id" wire:model="state.religion_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
            @foreach ($religions as $religion)
                <option value="{{ $religion->getKey() }}" @if ($religion->getKey() === $state['religion_id']) selected @endif>
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
            @foreach ($denominations ?? [] as $denomination)
                <option value="{{ $denomination->getKey() }}" @if ($denomination->getKey() === $state['denomination_id']) selected @endif>
                    {{ $denomination->name }}
                </option>
            @endforeach
        </select>
        <x-jet-label for="note">{{ __('Note') }}</x-jet-label>
        <x-jet-input type="text" id="note" wire:model.defer="note" value="{{ $state['note'] }}" />
    </div>
</div>
