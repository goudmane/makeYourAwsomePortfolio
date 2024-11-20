<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portfolios = $request->user()->portfolios()->latest()->paginate();
        return PortfolioResource::collection($portfolios);
    }

    public function store(StorePortfolioRequest $request)
    {
        $portfolio = $request->user()->portfolios()->create($request->validated());
        return new PortfolioResource($portfolio);
    }

    public function show(Portfolio $portfolio)
    {
        $this->authorize('view', $portfolio);
        return new PortfolioResource($portfolio);
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);
        $portfolio->update($request->validated());
        return new PortfolioResource($portfolio);
    }

    public function destroy(Request $request, Portfolio $portfolio)
    {
        $this->authorize('delete', $portfolio);
        $portfolio->delete();
        return response()->noContent();
    }
}
