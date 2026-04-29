<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Services\VisitPdfGenerator;
use Illuminate\Http\Response;

class VisitPdfController extends Controller
{
    public function show(Visit $visit, VisitPdfGenerator $pdfGenerator): Response
    {
        return response($pdfGenerator->generate($visit), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$pdfGenerator->filename($visit).'"',
            'Cache-Control' => 'private, max-age=0, must-revalidate',
        ]);
    }
}
