<?php

use App\Http\Controllers\Admin\ComplaintAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\VisitAdminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VisitPdfController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [PublicNewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [PublicNewsController::class, 'show'])->name('news.show');
Route::post('/kunjungan', [VisitController::class, 'store'])->name('visits.store');
Route::get('/kunjungan/{visit}/surat-pdf', [VisitPdfController::class, 'show'])
    ->middleware('signed')
    ->name('visits.pdf');
Route::post('/pengaduan', [ComplaintController::class, 'store'])->name('complaints.store');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['permission:manage_users'])->group(function () {
        Route::resource('/users', UserController::class);
    });

    Route::middleware(['permission:manage_news'])->group(function () {
        Route::resource('/news', AdminNewsController::class);
    });

    Route::middleware(['permission:manage_galleries'])->group(function () {
        Route::resource('/galleries', GalleryController::class);
    });

    Route::middleware(['permission:manage_visits'])->group(function () {
        Route::resource('/visits', VisitAdminController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::patch('/visits/{visit}/update-status', [VisitAdminController::class, 'updateStatus'])->name('visits.update-status');
    });

    Route::middleware(['permission:manage_complaints'])->group(function () {
        Route::resource('/complaints', ComplaintAdminController::class)->only(['index', 'show', 'update', 'destroy']);
    });
});

require __DIR__.'/auth.php';