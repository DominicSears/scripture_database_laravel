@if (isset($comments) && ! empty($comments))
    <div class="w-full flex flex-col space-y-4">
        @foreach ($comments as $comment)
            <div @class([
                'w-full flex flex-col space-y-4 p-2',
                'border-l border-slate-400' => isset($level) && count($comment['replies']) > 0
            ]) @if (isset($level)) style="margin-left: {{ 10 * $level }}px; @endif">
                <!-- Header -->
                <div class="flex flex-col space-y-2">
                    <p>{{ $comment['content'] }}</p>
                </div>
                <!-- Footer -->
                <div class="flex flex-row space-x-4 items-center w-full">
                    {{-- TODO: Just propagate an event for replying to something rather than re-rendering? --}}
                    <livewire:item-votes :votes="$comment['votes']" type="Comment" :modelId="$comment['id']"  wire:key="{{ $loop->index . $comment['id'] }}" />
                    <p class="text-sm text-slate-500 hover:text-slate-600 hover:underline cursor-pointer" wire:click="reply({{ $comment['id'] }})">Reply</p>
                </div>
                @include('partials.comments', [
                    'comments' => $comment['replies'],
                    'level' => isset($level) ? $level + 1 : 1
                ])
            </div>
        @endforeach
    </div>
@endif
