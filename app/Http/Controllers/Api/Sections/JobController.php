<?php

namespace App\Http\Controllers\Api\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\JobRequest;
use App\Http\Resources\Sections\JobResource;
use App\Models\JobSection;
use App\Models\PortfolioLang;

class JobController extends Controller
{
    public function store(JobRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);
        
        $job = $lang->jobs()->create($request->validated());
        return new JobResource($job);
    }

    public function update(JobRequest $request, PortfolioLang $lang, JobSection $job)
    {
        $this->authorize('update', $lang->portfolio);
        
        $job->update($request->validated());
        return new JobResource($job);
    }

    public function destroy(PortfolioLang $lang, JobSection $job)
    {
        $this->authorize('update', $lang->portfolio);
        
        $job->delete();
        return response()->noContent();
    }
}