<div class="w-full px-12 py-6 space-y-6">
        <div class="flex flex-row space-x-8">
            <p class="text-4xl font-semibold">Edit Current Faith</p>
            <x-jet-button wire:click.prevent="newFaith">+ New Faith</x-jet-button>
        </div>
        <div class="flex flex-row space-x-4 bg-white shadow-lg rounded-2xl w-full h-auto p-8">
            <!-- Column 1 -->
            <div class="flex flex-col space-y-2 w-full">
                <x-jet-label for="religion_id" class="font-medium text-sm text-gray-700">{{ __('Religion') }}</x-jet-label>
                <select id="religion_id" name="religion_id" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->getKey() }}" @if ($religion->getKey() === $user->allFaiths->last()->religion_id) selected @endif>{{ $religion->name }}</option>
                    @endforeach
                </select>
                <x-jet-label for="start_of_faith" value="{{ __('Start of faith') }}" />
                <x-jet-input id="start_of_faith" class="block mt-1 w-full" type="text" name="start_of_faith" :value="old('start_of_faith')" required autofocus autocomplete="start_of_faith" value="{{ $user->allFaiths->last()->start_of_faith->format('Y-m-d') }}" />
                <x-jet-label for="note" value="{{ __('Note') }}" />
                <x-jet-input id="note" class="block mt-1 w-full" type="text" name="note" :value="old('note')" required autofocus autocomplete="note" value="{{ $user->allFaiths->last()->note }}" />
            </div>
            <!-- Column 2 -->
            <div class="flex flex-col space-y-2 w-full">
                <x-jet-label for="denomination_id" class="font-medium text-sm text-gray-700">{{ __('Denomination') }}</x-jet-label>
                <select id="denomination_id" name="denomination_id" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($denominations as $denomination)
                        <option value="{{ $denomination->getKey() }}" @if ($religion->getKey() === $user->allFaiths->last()->denomination_id) selected @endif>{{ $denomination->name }}</option>
                    @endforeach
                </select>
                <x-jet-label for="end_of_faith" value="{{ __('End of faith') }}" />
                <x-jet-input id="end_of_faith" class="block mt-1 w-full" type="text" name="end_of_faith" :value="old('end_of_faith')" required autofocus autocomplete="end_of_faith" value="{{ $user->allFaiths->last()->end_of_faith?->format('Y-m-d') ?? null }}" />
                <x-jet-label for="reason_left" value="{{ __('Reason left') }}" />
                <x-jet-input id="reason_left" class="block mt-1 w-full" type="text" name="reason_left" :value="old('reason_left')" required autofocus autocomplete="reason_left" value="{{ $user->allFaiths->last()->reason_left }}" />
            </div>
        </div>
    </div>
