<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // 📌 Liste des programmes
    public function index()
    {
        $programs = Program::latest()->get();

        return view('programs.index', compact('programs'));
    }

    // 📌 Formulaire création
    public function create()
    {
        return view('programs.create');
    }

    // 📌 Sauvegarde programme
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'instructor' => 'required',
        ]);

        Program::create($request->all());

        return redirect()->route('programs.index')
                         ->with('success', 'Program created successfully');
    }

    // 📌 Détail programme (SHOW)
    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    // 📌 Formulaire édition
    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    // 📌 Mise à jour
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'instructor' => 'required',
        ]);

        $program->update($request->all());

        return redirect()->route('programs.index')
                         ->with('success', 'Program updated successfully');
    }

    // 📌 Supprimer programme
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')
                         ->with('success', 'Program deleted successfully');
    }
}
