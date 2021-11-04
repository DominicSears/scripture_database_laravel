<?php

namespace App\Http\Resources;

use App\Models\Nugget;
use Illuminate\Http\Resources\Json\JsonResource;

class NuggetResource extends JsonResource
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
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'title' => $this->title,
            'explanation' => $this->explanation,
            'scripture_start' => $this->scripture_start,
            'scripture_end' => $this->scripture_end,
            'agree' => $this->agree,
            'disagree' => $this->disagree,
            'nugget_type' => Nugget::NUGGET_TYPES[$this->nugget_type_id],
        ];
    }
}
