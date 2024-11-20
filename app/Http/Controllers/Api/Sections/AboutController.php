<?php

namespace App\Http\Controllers\Api\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\AboutRequest;
use App\Http\Resources\Sections\AboutResource;
use App\Models\AboutSection;
use App\Models\PortfolioLang;

class AboutController extends Controller
{
    public function store(AboutRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);
        
        $about = $lang->about()->create($request->validated());
        return new AboutResource($about);
    }

    public function update(AboutRequest $request, PortfolioLang $lang, AboutSection $about)
    {
        $this->authorize('update', $lang->portfolio);
        
        $about->update($request->validated());
        return new AboutResource($about);
    }

    public function destroy(PortfolioLang $lang, AboutSection $about)
    {
        $this->authorize('update', $lang->portfolio);
        
        $about->delete();
        return response()->noContent();
    }
}