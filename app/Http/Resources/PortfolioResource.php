<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'langs' => PortfolioLangResource::collection($this->whenLoaded('langs')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}