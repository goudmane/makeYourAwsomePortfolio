<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobSection extends Model
{
    protected $fillable = [
        'portfolio_lang_id',
        'title',
        'company',
        'location',
        'range',
        'url',
        'highlights',
        'metadata'
    ];

    protected $casts = [
        'highlights' => 'array',
        'metadata' => 'array'
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }
}