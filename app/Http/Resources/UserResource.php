<?php

namespace App\Http\Resources;

use App\Models\Faith;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->name,
            'username' => $this->username,
            'gender' => $this->gender,
            'country_iso_code' => $this->country_iso_code,
        ];

        $relations = array_keys($this->resource->getRelations());

        if (in_array('faith', $relations)) {
            $data['faith'] = FaithResource::make($this->whenLoaded('faith'));
        } else if (in_array('scopedFaith', $relations)) {
            $data['faith'] = FaithResource::make($this->whenLoaded('scopedFaith'));
        } else if (in_array('allFaiths', $relations) || in_array('scopedFaiths', $relations)) {
            $data['faiths'] = FaithResource::collection($this->whenLoaded('allFaiths'));
        }

        if (in_array('nuggets', $relations)) {
            $data['nuggets'] = NuggetResource::collection($this->whenLoaded('nuggets'));
        }

        if (in_array('posts', $relations)) {
            $data['posts'] = PostResource::collection($this->whenLoaded('posts'));
        } else if (in_array('updatedPosts', $relations)) {
            $data['posts'] = PostResource::collection($this->whenLoaded('updatedPosts'));
        }

        return $data;
    }
}
