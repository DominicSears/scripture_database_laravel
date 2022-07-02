<?php

namespace App\Http\Livewire\Doctrines;

use Livewire\Component;
use App\Models\Religion;
use App\Models\Denomination;
use App\Traits\ConvertEmptyArrayStrings;
use App\Contracts\Doctrine\CreatesDoctrine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Create extends Component
{
    use ConvertEmptyArrayStrings;

    // TODO: Make a notification for successful or failures

    public array $state = [];

    public ?string $type;

    public ?int $typeId;

    public Collection $religions;

    public ?Collection $denominations = null;

    public Religion|Denomination $entity;

    /**
     * Constructor for Livewire component
     *
     * @param  ?string  $type
     * @param  ?int  $typeId
     * @return void
     *
     * @throws NotFoundHttpException
     */
    public function mount(?int $religionId = null, ?int $denominationId = null)
    {
        if (isset($religionId)) {
            $this->entity = Religion::query()->find($religionId);
        } elseif (isset($denominationId)) {
            $this->entity = Denomination::query()
                ->with('religion')
                ->find($denominationId);
        }

        $hasId = isset($religionId, $denominationId);

        $this->religions = Religion::all();

        $religionId ??= isset($denominationId) ?
            $this->entity->religion_id :
            $this->religions->first()->getKey();

        if (! $hasId) {
            $this->entity = Religion::query()->find($religionId);
        }

        $this->denominations = Denomination::query()
            ->with('religion')
            ->where('religion_id', $religionId)
            ->where('approved', true)
            ->get();

        $this->state = ['religion_id' => $religionId, 'denomination_id' => $denominationId ?? 0];
    }

    public function submit(CreatesDoctrine $createDoctrine)
    {
        $this->state['created_by'] = auth()->id();

        $createDoctrine(
            $this->convertEmptyArrayStrings(
                array_merge($this->state, [
                    'doctrinable_type' => empty($this->state['denomination_id']) ?
                        Religion::class : Denomination::class,
                    'doctrinable_id' => empty($this->state['denomination_id']) ?
                        $this->state['religion_id'] : $this->state['denomination_id'],
                ])
            )
        );

        $this->state = ['religion_id' => $this->religions->first()->getKey(), 'denomination_id' => 0];
    }

    public function updatedStateReligionId()
    {
        // Change entity title and change denominations
        $this->entity = $this->religions->find($this->state['religion_id']);

        // Use the religion models already loaded
        $this->denominations = Denomination::query()
            ->with(['religion' => function (HasOne $relation) {
                return $this->religions->find(
                    $relation->getParent()->religion_id
                );
            }])
            ->where('religion_id', $this->state['religion_id'])
            ->get();
    }

    public function updatedStateDenominationId()
    {
        if (! empty($this->state['denomination_id'])) {
            $this->entity = $this->denominations->find($this->state['denomination_id']);
        } else {
            $this->entity = $this->religions->find($this->state['religion_id']);
        }
    }

    public function render()
    {
        return view('livewire.doctrines.create');
    }
}
