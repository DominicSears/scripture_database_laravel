<div class="flex flex-col space-y-4 w-full">
    <!-- Title & Type -->
    <div class="flex flex-row space-x-4 w-full">
        <h3 class="text-2xl font-semibold text-sky-900">{{ $model->title }}</h3>
    </div>
    <!-- Controls -->
    <div class="flex flex-row space-x-4 w-full">
        <select id="type" wire:model="type" class="rounded-xl">
            <!-- TODO: Think of a better way to grab doctrinable types? -->
            <option value="Doctrine">Doctrine</option>
            <option value="Religion">Religion</option>
            <option value="Denomination">Denomination</option>
            <option value="Post">Post</option>
        </select>
    </div>
</div>
