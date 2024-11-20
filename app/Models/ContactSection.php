<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactSection extends Model
{
    protected $fillable = [
        'portfolio_lang_id',
        'content',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }
}