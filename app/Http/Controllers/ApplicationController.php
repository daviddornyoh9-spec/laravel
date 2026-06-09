<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // 📌 Formulaire
    public function create(Program $program)
    {
        return view('applications.create', compact('program'));
    }

    public function store(Request $request, Program $program)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:50',
        'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // upload CV
    $cvPath = $request->file('cv')->store('cvs', 'public');

    Application::create([
        'program_id' => $program->id,   // ✅ important
        'user_id' => Auth::id(),       // ✅ utilisateur connecté
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'cv' => $cvPath,
        'status' => 'New',
    ]);

    return redirect()->route('apply.success')
        ->with('success', '🎉 Application submitted successfully!');
}
}