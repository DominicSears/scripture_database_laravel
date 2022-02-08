<div class="p-8 bg-white rounded-2xl shadow-xl flex flex-col space-y-8">
    <p class="text-4xl font-bold">New Faith - {{ empty($user->first_name) ? 'Nujll' : $user->name }}</p>
    @if (empty($user->first_name))
        <pre>
            {{ json_encode($user->toArray(), JSON_PRETTY_PRINT) }}
        </pre>
    @endif
    <!-- TODO: Change structure to have rows instead of columns -->
    <div class="w-full h-auto flex flex-row space-x-4">
        <!-- Column 1 -->
        <div class="flex flex-col w-full space-y-2">
            <x-jet-label for="religion_id">{{ __('Religion') }}</x-jet-label>
            <select id="religion_id" wire:model="state.religion_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                @forelse ($religions ?? [] as $religion)
                    <option value="{{ $religion->getKey() }}" @if ($loop->first) selected="true" @endif>
                        {{ $religion->name }}
                    </option>
                @empty
                    <option selected disabled>No religions available</option>
                @endforelse
            </select>
            @error('state.religion_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            <x-jet-label for="start_of_faith">{{ __('Start of Faith') }}</x-jet-label>
            <x-jet-input id="start_of_faith" wire:model.defer="state.start_of_faith" type="text" value="{{ $state['start_of_faith'] ?? '' }}" />
            @error('state.start_of_faith')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
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
                    <option selected disabled>No denominations available</option>
                @endforelse
            </select>
            <x-jet-label for="note">{{ __('Note') }}</x-jet-label>
            <x-jet-input type="text" id="note" wire:model.defer="state.note" value="{{ $state['note'] ?? '' }}" />
        </div>
    </div>
    <p class="font-semibold text-2xl">Previous Faith Fields</p>
    <div class="flex flex-row space-x-4 w-full">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-2 w-full">
            <x-jet-label for="end_of_faith">{{ __('End of Faith') }}</x-jet-label>
            <x-jet-input type="text" wire:model.defer="state.end_of_faith" id="end_of_faith" />
            @error('state.end_of_faith')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-2 w-full">
            <x-jet-label for="reason_left">{{ __('Reason Left') }}</x-jet-label>
            <x-jet-input type="text" wire:model.defer="state.reason_left" id="reason_left" />
            @error('state.reason_left')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="flex flex-row space-x-2 justify-end">
        <button class="px-4 py-2 font-semibold bg-white hover:ring-1 hover:ring-gray-400 cursor-pointer rounded-lg">Cancel</button>
        <button wire:click="submit" class="px-4 py-2 font-semibold hover:bg-gray-800 bg-gray-700 text-white cursor-pointer rounded-lg">Submit</button>
    </div>
</div>