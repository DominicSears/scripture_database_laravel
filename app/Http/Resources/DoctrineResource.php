<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctrineResource extends JsonResource
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
            'created_by' => $this->created_by,
            'title' => $this->title,
            'description' => $this->description,
            'scriptures' => $this->scriptures,
            'religion_id' => $this->religion_id,
            'denomination_id' => $this->denomination_id
        ];
    }
}
