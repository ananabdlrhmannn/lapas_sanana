<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisitAdminController extends Controller
{
    public function index(): View
    {
        $visits = Visit::latest()->paginate(10);
        return view('admin.visits.index', compact('visits'));
    }

    public function updateStatus(Request $request, Visit $visit): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak,selesai',
        ]);

        $visit->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status kunjungan berhasil diperbarui.');
    }
}
