<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function dashboard()
{
    $updates = Update::whereHas('employee', function ($query) {
        $query->where('department_id', auth()->user()->department_id);
    })->get();

    $summary = $updates->groupBy('employee_id')->map(function ($group) {
        return $group->count();
    });

    return view('head.dashboard', compact('summary'));
}

public function filterByEmployee($employeeId)
{
    $updates = Update::where('employee_id', $employeeId)->get();
    return view('head.updates', compact('updates'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:employees',
        'password' => 'required|string|min:8',
    ]);

    Employee::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully!');
}
}
