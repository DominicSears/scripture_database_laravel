<div class="flex flex-col space-y-4 w-full p-8">
    <div class="flex flex-row space-x-4">
        <p class="text-3xl font-semibold">
            Religions - ({{ $religions->where('approved', true)->count() }})
        </p>
        <x-jet-button wire:click="newReligion">
            <svg wire:loading wire:target="newReligion" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            + New Religion
        </x-jet-button>
    </div>
    <div class="flex flex-col space-y-2">
        @forelse ($religions as $religion)
            <div class="flex flex-row justify-between items-center">
                <a class="font-semibold text-md" href="{{ route('religions.denominations', ['religion' => $religion->getKey()]) }}">
                    {{ $religion->name }}
                </a>
                <div class="flex flex-row space-x-2">
                    @if (!$religion->approved)
                        <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-green-300 hover:bg-green-400" wire:click="approve({{ $religion->getKey() }})">Approve</button>
                    @endif

                    <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-yellow-300 hover:bg-yellow-400" wire:click="edit({{ $religion->getKey() }})">Edit</button>
                    <button type="button" class="hover:cursor-pointer text-white font-semibold py-1 px-6 text-lg rounded-md bg-red-300 hover:bg-red-400" wire:click="delete({{ $religion->getKey() }})">Delete</button>
                </div>
            </div>
        @empty
            <div class="flex justify-center items-center w-full">
                <p class="font-semibold text-md">No religions</p>
            </div>
        @endforelse
    </div>
</div>
