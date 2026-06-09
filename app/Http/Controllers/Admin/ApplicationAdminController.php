<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationAdminController extends Controller
{
    // 📌 LISTE DES CANDIDATURES
    public function index()
    {
        $applications = Application::with('program')->latest()->get();

        return view('admin.applications.index', compact('applications'));
    }

    // 📌 UPDATE STATUS
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:New,Under Review,Accepted,Rejected',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
