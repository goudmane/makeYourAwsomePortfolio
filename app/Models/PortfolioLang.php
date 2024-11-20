<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PortfolioLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'language',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function hero(): HasOne
    {
        return $this->hasOne(HeroSection::class, 'portfolio_lang_id');
    }

    public function about(): HasOne
    {
        return $this->hasOne(AboutSection::class);
    }

    public function contact(): HasOne
    {
        return $this->hasOne(ContactSection::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(JobSection::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(ProjectSection::class)->orderBy('order');
    }
}
