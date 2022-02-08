<x-app-layout>
    <div class="w-full px-12 py-6 space-y-6">
        <p class="text-4xl font-semibold">Edit {{ $user->name }}</p>
        <livewire:users.edit-user :user="$user" />
        <livewire:faith.edit-faith :user="$user" :religions="$religions" :faith="$user->allFaiths->last()" />
    </div>
</x-app-layout>