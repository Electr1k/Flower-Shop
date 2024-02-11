<?php

namespace App\Http\Resources\Flower;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlowerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'count' => $this->count,
            'price' => $this->price,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            'images' => ImageResource::collection($this->images),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
