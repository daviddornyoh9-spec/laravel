<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationApiController extends Controller
{
    // 📌 GET all applications
    public function index()
    {
        return response()->json(
            Application::with('program')->get()
        );
    }

    // 📌 STORE application
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $application = Application::create([
            'program_id' => $request->program_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'New',
        ]);

        return response()->json($application);
    }

    // 📌 UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:New,Under Review,Accepted,Rejected',
        ]);

        $application = Application::findOrFail($id);

        $application->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Status updated',
            'data' => $application
        ]);
    }
}
