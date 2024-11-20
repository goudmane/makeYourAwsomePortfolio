<?php

namespace App\Http\Resources\Sections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order' => $this->order,
            'title' => $this->title,
            'description' => $this->description,
            'cover' => $this->cover,
            'github' => $this->github,
            'external' => $this->external,
            'tech' => $this->tech,
            'metadata' => $this->metadata,
            'is_featured' => $this->is_featured,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}