<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Doctrine;
use App\Models\Nugget;
use App\Models\Post;
use App\Models\Religion;
use Livewire\Component;
use Illuminate\Support\Collection;

class Feed extends Component
{
    public array $filter = [
        'browse_all' => true,
        'recent' => false,
        'following' => false
    ];

    public Collection $feedItems;

    public function mount()
    {
        $posts = Post::with(['createdBy'])
            ->get()
            ->take(10);

        $religions = Religion::with(['createdBy'])
            ->get()
            ->take(10);

        $denominations = Denomination::with(['createdBy'])
            ->get()
            ->take(10);

        $nuggets = Nugget::with(['createdBy'])
            ->get()
            ->take(10);

        $feedItems = Doctrine::with(['createdBy'])
            ->get()
            ->take(10)
            ->merge($nuggets)
            ->merge($posts)
            ->merge($denominations);

        $this->setFeedItems($feedItems);
    }

    /**
     * Set the array of feed items
     *
     * @param Collection<\Illuminate\Database\Eloquent\Model> $collection
     * @return void
     */
    public function setFeedItems(Collection $collection)
    {
        $arr = [];

        foreach ($collection as $item) {
            $arr[] = [
                'title' => $item->getAttribute('title'),
                'description' => $item->getAttribute('description'),
                'created_by' => $item->getRelation('createdBy')->getAttribute('username'),
                'created_at' => $item->getAttribute('created_at')
            ];
        }

        $this->feedItems = collect($arr);
    }

    public function filter(string $filterBy)
    {
        if (isset($this->filter[$filterBy])) {
            $array = array_keys(
                array_diff_key($this->filter, array_flip([$filterBy]))
            );
    
            $this->filter[$filterBy] = true;
    
            foreach($array as $key) {
                $this->filter[$key] = false;
            }
        }
    }

    public function getFilterKey(): string
    {
        foreach($this->filter as $key => $isFilterKey) {
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
