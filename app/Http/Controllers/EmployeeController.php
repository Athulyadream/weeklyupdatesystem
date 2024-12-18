<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'update_text' => 'nullable|string',
            'update_file' => 'nullable|file|mimes:jpeg,png,pdf',
        ]);
    
        if ($request->hasFile('update_file')) {
            $filePath = $request->file('update_file')->store('updates');
        }
    
        Update::create([
            'employee_id' => auth()->id(),
            'text' => $validated['update_text'] ?? null,
            'file_path' => $filePath ?? null,
        ]);
    
        return back()->with('success', 'Update submitted successfully!');
    }
}
