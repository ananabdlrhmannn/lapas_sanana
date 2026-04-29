<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintAdminController extends Controller
{
    public function index(): View
    {
        $complaints = Complaint::latest()->paginate(10);
        return view('admin.complaints.index', compact('complaints'));
    }

    public function update(Request $request, Complaint $complaint): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
            'admin_note' => 'nullable|string',
        ]);

        $complaint->update($validated);

        return back()->with('success', 'Pengaduan berhasil diperbarui.');
    }
}