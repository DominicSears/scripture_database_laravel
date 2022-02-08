<div class="flex flex-col space-y-4 bg-white shadow-lg rounded-2xl w-full h-auto p-8">
    <div class="flex flex-row space-x-4 w-full">
        <!-- Column 1 -->
        <div class="flex flex-col space-y-2 w-full">
            <x-jet-label for="first_name">{{ __('First Name:') }}</x-jet-label>
            <x-jet-input wire:model.defer="state.first_name" class="w-full" type="text" id="first_name" value="{{ $user->first_name }}" />
            <x-jet-label for="gender" class="font-medium text-sm text-gray-700">{{ __('Gender') }}</x-jet-label>
            <select wire:model.defer="state.gender" id="gender" name="gender" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="M" @if ($user->gender === 'M') selected @endif>Male</option>
                <option value="F" @if ($user->gender === 'F') selected @endif>Female</option>
            </select>
        </div>
        <!-- Column 2 -->
        <div class="flex flex-col space-y-2 w-full">
            <x-jet-label for="last_name">{{ __('Last Name:') }}</x-jet-label>
            <x-jet-input wire:model.defer="state.last_name" class="w-full" type="text" value="{{ $user->last_name }}" />
        </div>
    </div>

    <div class="flex flex-row space-x-4">
        <x-jet-button wire:click="submit">
            <svg wire:loading wire:target="submit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Submit
        </x-jet-button>
    </div>
</div>