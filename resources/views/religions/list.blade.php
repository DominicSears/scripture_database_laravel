<x-app-layout>
    <x-slot name="header">List Religions</x-slot>
    <div class="flex flex-col space-y-4 w-full bg-white rounded-2xl shadow-2xl">
        <livewire:religions.list-religions :showPending="$showPending" />
    </div>
</x-app-layout>