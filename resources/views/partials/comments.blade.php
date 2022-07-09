@if (isset($comments) && ! empty($comments))
    <div class="w-full flex flex-col space-y-4">
        @foreach ($comments as $comment)
            <div class="w-full border-l border-slate-400 flex flex-col space-y-4 p-2"
                @if (isset($level)) style="margin-left: {{ 10 * $level }}px; @endif">
                <!-- Header -->
                <div class="flex flex-col space-y-2">
                    <p>{{ $comment['created_by'] }}</p>
                    <p>{{ $comment['content'] }}</p>
                </div>
                <!-- Footer -->
                <div class="flex flex-row space-y-2">
                    <livewire:item-votes :votes="$comment['votes']" type="Comment" :modelId="$comment['id']" />
                </div>
            </div>
            
            @include('partials.comments', [
                'comments' => $comment['replies'],
                'level' => isset($level)
                    ? $level + 1
                    : 1
            ])
        @endforeach
    </div>
@endif
