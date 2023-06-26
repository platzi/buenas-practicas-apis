<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'type' => 'recipe',
            'attributes' => [
                'category'      => $this->category->name,
                'author'        => $this->user->name,
                'title'         => $this->title,
                'description'   => $this->description,
                'ingredients'   => $this->ingredients,
                'instructions'  => $this->instructions,
                'image'         => $this->image,
                'tags'          => $this->tags->pluck('name')->implode(', '),
            ],
        ];
    }
}
