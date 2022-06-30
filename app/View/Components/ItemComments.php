<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Contracts\Comment\Commentable;
use App\Models\Comment;
use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Collection;

class ItemComments extends Component
{
    use MapsModels;

    public ?int $modelId = null;

    public int $commentAmount;

    /**
     * Create a new component instance.
     * 
     * @param  Commentable|array  $item
     * @param  ?Collection  $votes
     * @return void
     */
    public function __construct(Commentable|array|null $commentable = null, $comments = null)
    {
        // TODO: Might need to be a livewire component to emit events to parent component?
        if (! isset($comments) || ($comments instanceof Collection && $comments->isEmpty())) {
            $comments = is_array($commentable) ?
                Comment::query()
                    ->where('commentable_type', $this->mapToClassName($commentable['model_type']))
                    ->where('commentable_id', $commentable['model_id'])
                    ->get() :
                $commentable->comments()->get();
            
            $this->modelId = $commentable['model_id'];
        }

        // Note: Comments can't be commentable types.
        // Just comment toward the object and the
        // parent_id would be the thread root
        $this->commentAmount = $comments->count();

        $this->modelId ??= $comments->first()->commentable_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-comments');
    }
}
