<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\ApplicationAdminController;

use App\Models\Program;
use App\Models\Application;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (ADMIN / USER SPLIT)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    $user = auth()->user();

    // 👑 ADMIN DASHBOARD
    if ($user && $user->role === 'admin') {

        $programsCount = Program::count();
        $applicationsCount = Application::count();
        $acceptedCount = Application::where('status', 'Accepted')->count();
        $rejectedCount = Application::where('status', 'Rejected')->count();

        return view('dashboard.admin', compact(
            'programsCount',
            'applicationsCount',
            'acceptedCount',
            'rejectedCount'
        ));
    }

    // 👤 USER DASHBOARD
    $applications = Application::where('email', $user->email)
        ->latest()
        ->get();

    return view('dashboard.user', compact('applications'));

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE (USER)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| PROGRAMS (CRUD)
|--------------------------------------------------------------------------
*/
Route::resource('programs', ProgramController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| APPLY SYSTEM (USER ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/apply/{program}', [ApplicationController::class, 'create'])
        ->name('apply.create');

    Route::post('/apply/{program}', [ApplicationController::class, 'store'])
        ->name('apply.store');

    Route::get('/apply/success', function () {
        return view('applications.success');
    })->name('apply.success');
});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY ROUTES 🔐
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/applications', [ApplicationAdminController::class, 'index'])
        ->name('admin.applications.index');

    Route::patch('/applications/{application}', [ApplicationAdminController::class, 'updateStatus'])
        ->name('admin.applications.update');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';