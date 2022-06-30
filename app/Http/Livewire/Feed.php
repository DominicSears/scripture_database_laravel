<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Nugget;
use Livewire\Component;
use App\Models\Doctrine;
use App\Models\Religion;
use App\Traits\MapsModels;
use App\Models\Denomination;
use Illuminate\Database\Query\Builder;

class Feed extends Component
{
    use MapsModels;

    public array $filter = [
        'browse_all' => true,
        'recent' => false,
        'following' => false,
    ];

    public array $feedItems;

    protected array $followedItems;

    public function mount()
    {
        // TODO: Eagerload votables and commentables here instead of N+1

        $this->setFeedItems();
    }

    protected function applyFeedFilter(Builder $query, string $type)
    {
        if ($this->filter['following']) {
            return $query->whereIn('id', $this->followedItems[$type]);
        }
    }

    protected function setFollowedItems()
    {
        //
    }

    /**
     * Set the array of feed items
     *
     * @param  Collection<\Illuminate\Database\Eloquent\Model>  $collection
     * @return void
     */
    public function setFeedItems(): void
    {
        $posts = Post::with(['createdBy', 'votes'])
            ->get()
            ->take(10);

        $religions = Religion::with(['createdBy', 'votes'])
            ->get()
            ->take(10);

        $denominations = Denomination::with(['createdBy', 'votes'])
            ->get()
            ->take(10);

        // Should be nuggetable for the different possible entries
        $nuggets = Nugget::with(['createdBy', 'votes'])
            ->get()
            ->take(10);

        $feedItems = Doctrine::with(['createdBy', 'votes'])
            ->get()
            ->take(10)
            ->merge($nuggets)
            ->merge($posts)
            ->merge($denominations)
            ->sortByDesc('created_at');

        $arr = [];

        foreach ($feedItems as $item) {
            $type = $this->mapToCodeName($item::class);

            $arr[] = [
                'title' => $item->getAttribute('title'),
                'description' => $item->getAttribute('description'),
                'created_by' => $item->getRelation('createdBy')->getAttribute('username'),
                'created_at' => $item->getAttribute('created_at'),
                'type' => $feedItemType = $item->getAttribute('feed_item_type') ?? ucfirst($type),
                'content' => $item->getAttribute('description'),
                'votes_number' => $item->getRelation('votes')->sum('amount'),
                'comments_number' => $item->comments->count(),
                'model_type' => $type,
                'model_id' => $item->getKey(),
            ];
        }

        $this->feedItems = $arr;
    }

    public function filter(string $filterBy)
    {
        if (isset($this->filter[$filterBy])) {
            $array = array_keys(
                array_diff_key($this->filter, array_flip([$filterBy]))
            );

            $this->filter[$filterBy] = true;

            foreach ($array as $key) {
                $this->filter[$key] = false;
            }
        }
    }

    public function getFilterKey(): string
    {
        foreach ($this->filter as $key => $isFilterKey) {
            if ($isFilterKey) {
                return $key;
            }
        }

        return $this->filter[0] ?? 'browse_all';
    }

    public function render()
    {
        return view('livewire.feed');
    }
}
