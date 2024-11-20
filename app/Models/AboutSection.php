<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutSection extends Model
{
    protected $fillable = [
        'portfolio_lang_id',
        'title',
        'content',
        'skills',
        'metadata'
    ];

    protected $casts = [
        'skills' => 'array',
        'metadata' => 'array'
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }
}