<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $galleries = Gallery::where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('news', 'galleries'));
    }
    
}