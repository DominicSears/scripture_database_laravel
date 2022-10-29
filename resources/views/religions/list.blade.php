<x-app-layout>
    <x-slot name="header">List Religions</x-slot>
    <div class="pt-8 pb-12 px-6">
        <div class="flex flex-col space-y-4 w-full bg-white rounded-2xl shadow-2xl">
            <livewire:religions.list-religions :showPending="$showPending" />
        </div>
    </div>
</x-app-layout>
