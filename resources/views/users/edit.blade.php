<x-app-layout>
    <div class="w-full px-12 py-6 space-y-6 flex flex-col">
        <p class="text-4xl font-semibold">Edit {{ $user->name }}</p>
        <livewire:users.edit-user :user="$user" />
        <livewire:faith.edit-faith :user="$user" :religions="$religions" :faith="$user->allFaiths->last()" />
        <livewire:faith.faith-logs :faiths="$user->allFaiths" :selectedId="$faith_id" />
    </div>
</x-app-layout>