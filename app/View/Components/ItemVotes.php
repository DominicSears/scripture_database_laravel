<?php

namespace App\View\Components;

use App\Models\Vote;
use Illuminate\View\Component;
use App\Contracts\Vote\Votable;
use Illuminate\Database\Eloquent\Collection;

class ItemVotes extends Component
{
    public int $voteAmount;

    public int $votesFromUser;

    public bool $upvoted;

    public bool $downvoted;

    public Collection $votes;

    /**
     * Create a new component instance.
     *
     * @param  Votable|array|null  $votable
     * @param  ?Collection  $votes
     */
    public function __construct(Votable|array|null $votable = null, ?Collection $votes = null)
    {
        if ($votes->isEmpty()) {
            $this->votes = is_array($votable) ?
                Vote::query()->where('votable_type', $votable['model_type'])
                    ->where('votable_id', $votable['model_id'])
                    ->get() :
                $votable->votes()->get();
        } else {
            $this->votes = $votes;
        }

        $this->voteAmount = $this->votes->sum('amount');

        $this->votesFromUser = $this->votes
            ->where('user_id', auth()->id())
            ->sum('amount');

        $this->upvoted = $this->votesFromUser > 0;

        $this->downvoted = $this->votesFromUser < 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-votes');
    }
}
