<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_lang_id',
        'title',
        'body',
    ];

    public function portfolioLang(): BelongsTo
    {
        return $this->belongsTo(PortfolioLang::class);
    }
}
