<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        Complaint::create($validated);

        return back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}