<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaithResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dateFormat = 'Y-m-d H:i:s';

        return [
            'id' => $this->id,
            'created_at' => $this->created_at->format($dateFormat),
            'updated_at' => $this->updated_at?->format($dateFormat),
            'religion' => ReligionResource::make($this->whenLoaded('religion')),
            'denomination' => DenominationResource::make($this->whenLoaded('denomination')),
            'start_of_faith' => $this->start_of_faith->format($dateFormat),
            'end_of_faith' => $this->end_of_faith?->format($dateFormat),
            'user_id' => $this->user_id,
            'note' => $this->note,
            'reason_left' => $this->reason_left,
        ];
    }
}
