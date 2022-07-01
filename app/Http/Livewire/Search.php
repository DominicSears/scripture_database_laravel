<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Search extends Component
{
    public array $state = [];

    public array $searchResults = [];

    public function mount()
    {
        $this->state = [
            'search' => ''
        ];
    }

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
        $this->state['search'] = $value;

        $query = $value;

        $this->clearSearchResults();

        $searchable = [
            \App\Models\Doctrine::class,
            \App\Models\Denomination::class,
            \App\Models\Religion::class,
            \App\Models\Post::class,
            \App\Models\Doctrine::class,
            \App\Models\User::class,
        ];

        $models = new Collection();

        if (! empty($query)) {
            foreach ($searchable as $type) {
                /** @var Collection $searchModels */
                $searchModels = call_user_func([$type, 'query'])
                    ->scopes(['search' => [$query]])
                    ->get();
    
                if ($searchModels->isNotEmpty()) {
                    $models = $models->union($searchModels);
                }
            }
    
            $models->each(function (Model $item) {
                $this->searchResults[] = [
                    'title' => $item->title,
                ];
            });
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
