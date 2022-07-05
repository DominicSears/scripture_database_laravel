<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\MapsModels;
use Illuminate\Support\Collection;
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

    public int $limit = 10;

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
        $feedable = [
            \App\Models\Doctrine::class,
            \App\Models\Denomination::class,
            \App\Models\Religion::class,
            \App\Models\Post::class,
            \App\Models\Nugget::class,
        ];

        $feedItems = new Collection();

        foreach ($feedable as $feedItem) {
            /** @var Collection $feedModel */
            $feedModel = call_user_func([$feedItem, 'query'])
                ->with(['createdBy', 'votes'])
                ->take($this->limit)
                ->get()
                ->collect();

            if ($feedModel->isNotEmpty()) {
                $feedItems = $feedItems->merge($feedModel);
            }
        }

        $arr = [];

        foreach ($feedItems->sortByDesc('created_at') as $item) {
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
