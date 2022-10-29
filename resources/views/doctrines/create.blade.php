<x-app-layout>
    <x-slot name="header">Create Doctrine</x-slot>
    <div class="pb-12 px-6 pt-8">
        <livewire:doctrines.create :religionId="$religion_id" :denominationId="$denomination_id" />
    </div>
</x-app-layout>
