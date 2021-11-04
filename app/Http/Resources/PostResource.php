<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'updated_by' => UserResource::make($this->whenLoaded('updatedBy')),
            'published_at' => $this->published_at?->format($dateFormat),
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
