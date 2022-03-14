<div class="flex flex-col space-y-4 w-full p-8">
    <p class="font-bold text-lg">Doctrines for {{ $entity->name }}</p>
    @forelse ($entity->doctrines as $doctrine)
        <p class="font-semibold text-blue-400">
            Title: {{ $doctrine->title }}<br>
            Description: {{ $doctrine->description }}
        </p>
    @empty
        <p class="font-semibold text-red-400">No doctrines available</p>
    @endforelse
</div>
