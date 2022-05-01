@if ($entity->doctrines->isNotEmpty() || $childrenHaveDoctrine)
    <div class="flex flex-col space-y-2">
        <p class="text-3xl font-bold pb-2">{{ $entity->name }}</p>
        @if ($entity->doctrines->isNotEmpty())
            <div class="bg-white w-full px-8 py-12 flex flex-row space-x-6 overflow-x-auto h-auto">
                @foreach ($entity->doctrines as $doctrine)
                    <x-doctrine-card :doctrine="$doctrine" />
                @endforeach
            </div>
        @endif
        @if ($entity instanceof \App\Models\Religion && $childrenHaveDoctrine)
            @foreach ($entity->denominations as $denomination)
                @if ($denomination->doctrines->isNotEmpty())
                    <p class="text-2xl font-semibold">{{ $denomination->name }}</p>
                    <div class="bg-white w-full px-8 py-12 flex flex-row space-x-6 overflow-x-auto h-auto">
                        @foreach ($denomination->doctrines as $doctrine)
                            <x-doctrine-card :doctrine="$doctrine" />
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endif
