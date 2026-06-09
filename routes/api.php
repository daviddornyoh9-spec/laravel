<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Program;

/*
|--------------------------------------------------------------------------
| PROGRAMS API
|--------------------------------------------------------------------------
*/

// 🔹 Liste des programmes
Route::get('/programs', function () {
    return response()->json(Program::all());
});

// 🔹 Détail d’un programme
Route::get('/programs/{id}', function ($id) {
    return response()->json(Program::findOrFail($id));
});

// 🔹 Recherche programmes
Route::get('/programs-search', function (Request $request) {
    return Program::where('title', 'like', "%{$request->q}%")->get();
});
