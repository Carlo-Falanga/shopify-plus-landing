<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        if ($request->filled('website')) {
            return redirect()->route('landing');
        }

        $lead = Lead::create($request->validated());
        Mail::to(config('mail.lead_to'))->send(new LeadReceived($lead));

        return redirect()->route('landing.thanks')->with('lead_sent', [
            'platform' => $lead->current_platform,
            'monthly_orders' => $lead->monthly_orders,
        ]);
    }
}
