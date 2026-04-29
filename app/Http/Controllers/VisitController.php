<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'visitor_name' => 'required|string|max:100',
            'nik' => 'required|string|max:30',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'prisoner_name' => 'required|string|max:100',
            'relationship' => 'required|string|max:100',
            'visit_date' => 'required|date',
            'session' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        Visit::create($validated);

        return back()->with('success', 'Pendaftaran kunjungan berhasil dikirim.');
    }
}