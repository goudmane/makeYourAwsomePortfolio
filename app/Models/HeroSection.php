<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroSection extends Model
{
    protected $fillable = [
        'portfolio_lang_id',
        'items',
        'metadata'
    ];

    protected $casts = [
        'items' => 'array',
        'metadata' => 'array'
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }
}
