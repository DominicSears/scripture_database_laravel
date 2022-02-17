<div class="flex flex-col space-y-4">
    <p class="text-4xl font-semibold">Faith Logs</p>
    <table class="w-full h-auto p-8 bg-white rounded-2xl shadow-xl flex flex-col space-y-4">
        <thead>
            <tr class="flex flex-row justify-between items-center">
                <th class="pl-4 text-center w-full">#</th>
                <th class="text-center w-full">Religion</th>
                <th class="text-center w-full">Denomination</th>
                <th class="text-center w-full">Start of Faith</th>
                <th class="pr-4 text-center w-full">End of Faith</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faiths as $faith)
                @if ($loop->index === $loop->count - 1)
                    <tr><td colspan="4" class="py-6"></td></tr>
                @endif

                <tr @class([
                    'flex flex-row justify-between items-center',
                    'bg-green-200' => $loop->last,
                    'bg-gray-200' => ! $loop->last && $loop->even && $loop->count > 3,
                ])>
                    <td class="py-2 pl-4 text-center w-full">
                        <a href="{{ route('users.edit', ['user' => $faith->user_id, 'faith_id' => $faith->getKey()]) }}">#</a>
                    </td>
                    <td class="text-center w-full">{{ $faith->religion->name }}</td>
                    <td class="text-center w-full">{{ $faith->denomination?->name ?? 'N/A' }}</td>
                    <td class="text-center w-full">{{ $faith->start_of_faith->format('Y-m-d') }}</td>
                    <td class="pr-4 text-center w-full">{{ $faith->end_of_faith?->format('Y-m-d') ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
