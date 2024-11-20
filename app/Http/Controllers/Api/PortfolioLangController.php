<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StorePortfolioLangRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioLangRequest;
use App\Http\Resources\PortfolioLangResource;
use App\Models\Portfolio;
use App\Models\PortfolioLang;

class PortfolioLangController extends Controller
{
    public function store(StorePortfolioLangRequest $request, Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);
        $portfolioLang = $portfolio->langs()->create($request->validated());
        return new PortfolioLangResource($portfolioLang);
    }

    public function update(UpdatePortfolioLangRequest $request, Portfolio $portfolio, PortfolioLang $lang)
    {
        $this->authorize('update', $portfolio);
        $lang->update($request->validated());
        return new PortfolioLangResource($lang);
    }

    public function destroy(Portfolio $portfolio, PortfolioLang $lang)
    {
        $this->authorize('update', $portfolio);
        $lang->delete();
        return response()->noContent();
    }
}