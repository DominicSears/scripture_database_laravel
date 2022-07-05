<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Search extends Component
{
    public array $state = [
        'search' => '',
    ];

    public const LIMIT = 5;

    public array $searchResults = [];

    public function search()
    {
        $this->updatingStateSearch($this->state['search']);
    }

    public function clearSearchResults()
    {
        $this->searchResults = [];
    }

    public function updatingStateSearch(string $value)
    {
        // TODO: Move search functionality to action
        // Update and get search query and clear old results
        $this->state['search'] = $value;
        $query = $value;

        $this->clearSearchResults();

        // Prepare the searchable models and collection
        $searchable = [
            \App\Models\Doctrine::class,
            \App\Models\Denomination::class,
            \App\Models\Religion::class,
            \App\Models\Post::class,
            \App\Models\User::class,
        ];

        $models = new Collection();

        if (! empty($query)) {
            // Query the searchable models and add to collection
            foreach ($searchable as $type) {
                /** @var Collection $searchModels */
                $searchModels = call_user_func([$type, 'query'])
                    ->scopes(['search' => [$query]])
                    ->take(self::LIMIT)
                    ->get()
                    ->collect();

                if ($searchModels->isNotEmpty()) {
                    $models = $models->merge($searchModels);
                }
            }

            // Push deconstructed model to array
            $models->each(function (Model $item) {
                $this->searchResults[] = [
                    'title' => $item->title,
                    'link_title' => $item->link_title,
                ];
            });
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
