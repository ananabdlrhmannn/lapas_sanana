<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\News;
use App\Models\Visit;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'newsCount' => News::count(),
            'visitCount' => Visit::count(),
            'complaintCount' => Complaint::count(),
            'pendingVisits' => Visit::where('status', 'menunggu')->count(),
            'newComplaints' => Complaint::where('status', 'baru')->count(),
        ]);
    }
}