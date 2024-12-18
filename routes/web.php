<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('auth')->group(function () {
    Route::middleware('role:employee')->group(function () {
        Route::get('/employee/updates', [EmployeeController::class, 'index']);
        Route::post('/employee/updates', [EmployeeController::class, 'store']);
    });

    Route::middleware('role:head')->group(function () {
        Route::get('/head/dashboard', [DepartmentHeadController::class, 'dashboard']);
        Route::get('/head/updates/{employee}', [DepartmentHeadController::class, 'filterByEmployee']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('/admin/employees', AdminEmployeeController::class);
        Route::resource('/admin/departments', AdminDepartmentController::class);
        Route::resource('/admin/updates', AdminUpdateController::class);
    });
});
require __DIR__.'/auth.php';
