<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StoreSectionRequest;
use App\Http\Requests\Portfolio\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\PortfolioLang;
use App\Models\Section;

class SectionController extends Controller
{
    public function store(StoreSectionRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);
        $section = $lang->sections()->create($request->validated());
        return new SectionResource($section);
    }

    public function update(UpdateSectionRequest $request, PortfolioLang $lang, Section $section)
    {
        $this->authorize('update', $lang->portfolio);
        $section->update($request->validated());
        return new SectionResource($section);
    }

    public function destroy(PortfolioLang $lang, Section $section)
    {
        $this->authorize('update', $lang->portfolio);
        $section->delete();
        return response()->noContent();
    }
}