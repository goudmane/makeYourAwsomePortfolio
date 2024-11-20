<?php

namespace App\Http\Controllers\Api\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\ProjectRequest;
use App\Http\Resources\Sections\ProjectResource;
use App\Models\ProjectSection;
use App\Models\PortfolioLang;

class ProjectController extends Controller
{
    public function store(ProjectRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);
        
        $project = $lang->projects()->create($request->validated());
        return new ProjectResource($project);
    }

    public function update(ProjectRequest $request, PortfolioLang $lang, ProjectSection $project)
    {
        $this->authorize('update', $lang->portfolio);
        
        $project->update($request->validated());
        return new ProjectResource($project);
    }

    public function destroy(PortfolioLang $lang, ProjectSection $project)
    {
        $this->authorize('update', $lang->portfolio);
        
        $project->delete();
        return response()->noContent();
    }
}