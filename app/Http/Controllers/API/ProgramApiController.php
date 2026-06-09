<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramApiController extends Controller
{
    public function index()
    {
        return response()->json(Program::all());
    }

    public function store(Request $request)
    {
        $program = Program::create($request->all());

        return response()->json($program);
    }

    public function show(Program $program)
    {
        return response()->json($program);
    }

    public function update(Request $request, Program $program)
    {
        $program->update($request->all());

        return response()->json($program);
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
