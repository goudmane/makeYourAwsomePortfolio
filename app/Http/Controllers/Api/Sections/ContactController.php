<?php

namespace App\Http\Controllers\Api\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\ContactRequest;
use App\Http\Resources\Sections\ContactResource;
use App\Models\ContactSection;
use App\Models\PortfolioLang;

class ContactController extends Controller
{
    public function store(ContactRequest $request, PortfolioLang $lang)
    {
        $this->authorize('update', $lang->portfolio);
        
        $contact = $lang->contact()->create($request->validated());
        return new ContactResource($contact);
    }

    public function update(ContactRequest $request, PortfolioLang $lang, ContactSection $contact)
    {
        $this->authorize('update', $lang->portfolio);
        
        $contact->update($request->validated());
        return new ContactResource($contact);
    }

    public function destroy(PortfolioLang $lang, ContactSection $contact)
    {
        $this->authorize('update', $lang->portfolio);
        
        $contact->delete();
        return response()->noContent();
    }
}