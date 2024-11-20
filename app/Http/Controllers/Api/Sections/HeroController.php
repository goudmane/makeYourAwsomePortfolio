<?php

namespace App\Http\Controllers\Api\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\HeroRequest;
use App\Http\Resources\Sections\HeroResource;
use App\Models\HeroSection;
use App\Models\PortfolioLang;

class HeroController extends Controller
{
    public function store(HeroRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);

        /* dd($request->validated()); */

        $hero = $lang->hero()->create($request->validated());
        return new HeroResource($hero);
    }

    public function update(HeroRequest $request, PortfolioLang $lang, HeroSection $hero)
    {
        $this->authorize('update', $lang->portfolio);

        $hero->update($request->validated());
        return new HeroResource($hero);
    }

    public function destroy(PortfolioLang $lang, HeroSection $hero)
    {
        $this->authorize('update', $lang->portfolio);

        $hero->delete();
        return response()->noContent();
    }
}
