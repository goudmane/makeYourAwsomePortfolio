<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectSection extends Model
{
    protected $fillable = [
        'portfolio_lang_id',
        'order',
        'title',
        'description',
        'cover',
        'github',
        'external',
        'tech',
        'metadata'
    ];

    protected $casts = [
        'tech' => 'array',
        'metadata' => 'array',
        'order' => 'integer'
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }

    public function getIsFeaturedAttribute(): bool
    {
        return $this->metadata['is_featured'] ?? false;
    }

    public function setIsFeaturedAttribute($value): void
    {
        $metadata = $this->metadata ?? [];
        $metadata['is_featured'] = $value;
        $this->metadata = $metadata;
    }
}