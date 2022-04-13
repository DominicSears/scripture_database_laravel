@if ($entity->doctrines->isNotEmpty() || $childrenHaveDoctrine)
    <div class="flex flex-col space-y-6">
        <p class="text-2xl font-semibold">{{ $entity->name }}</p>
        <div class="bg-white w-auto p-8 rounded-2xl shadow-2xl flex flex-col space-y-4">
            @foreach ($entity->doctrines as $doctrine)
                <x-doctrine-card :doctrine="$doctrine" />
            @endforeach
            @if ($entity instanceof \App\Models\Religion && $childrenHaveDoctrine)
                @foreach ($entity->denominations as $denomination)
                    @if ($denomination->doctrines->isNotEmpty())
                        <p class="text-2xl font-semibold">{{ $denomination->name }}</p>
                        @foreach ($denomination->doctrines as $doctrine)
                            <x-doctrine-card :doctrine="$doctrine" />
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endif

