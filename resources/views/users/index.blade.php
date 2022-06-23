<x-app-layout>
    <div class="flex flex-col w-full h-full justify-center items-center">
        @forelse ($users as $user)
            <p>{{ $user->name }} - {{ $user->faith?->title ?? 'N/A' }}</p>
        @empty
            <p>No users</p>
        @endforelse
    </div>
</x-app-layout>
