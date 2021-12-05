<x-app-layout>
    <div class="w-full px-12 py-6 space-y-6">
        <p class="text-4xl font-semibold">Edit {{ $user->name }}</p>
        <div class="flex flex-row space-x-4 bg-white shadow-lg rounded-2xl w-full h-auto p-8">
            <!-- Column 1 -->
            <div class="flex flex-col space-y-2 w-full">
                <x-jet-label for="first_name">{{ __('First Name:') }}</x-jet-label>
                <x-jet-input class="w-full" type="text" id="first_name" value="{{ $user->first_name }}" />
                <x-jet-label for="gender" class="font-medium text-sm text-gray-700">{{ __('Gender') }}</x-jet-label>
                <select id="gender" name="gender" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="M" @if ($user->gender === 'M') selected @endif>Male</option>
                    <option value="F" @if ($user->gender === 'F') selected @endif>Female</option>
                </select>
            </div>
            <!-- Column 2 -->
            <div class="flex flex-col space-y-2 w-full">
                <x-jet-label for="last_name">{{ __('Last Name:') }}</x-jet-label>
                <x-jet-input class="w-full" type="text" value="{{ $user->last_name }}" />
            </div>
        </div>
        <livewire:faith.edit-faith :user="$user" :religions="$religions" :faith="$user->allFaiths->last()" />
    </div>
</x-app-layout>