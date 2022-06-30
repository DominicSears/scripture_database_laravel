<div class="flex flex-row flex-start space-x-2">
    <!-- Upvote -->
    <svg wire:click="upvote" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $upvoted ? 4 : 2 }}" @class([
            'h-6 w-6 hover:cursor-pointer', 'text-slate-500 hover:text-sky-500' => ! $upvoted, 'text-sky-500 hover:text-sky-700' => $upvoted ])>
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12" />
    </svg>
    <!-- Votes -->
    <span class="text-slate-500">{{ $voteAmount }}</span>
    <!-- Downvote -->
    <svg wire:click="downvote" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $downvoted ? 4 : 2 }}" @class([
            'h-6 w-6 hover:cursor-pointer', 'text-slate-500 hover:text-sky-500' => ! $downvoted, 'text-sky-500 hover:text-sky-700' => $downvoted])>
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 13l-5 5m0 0l-5-5m5 5V6" />
    </svg>
</div>
