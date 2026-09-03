<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        if ($request->filled('website')) {
            return redirect()->route('landing');
        }

        Lead::create($request->validated());

        return redirect()->route('landing.thanks');
    }
}
