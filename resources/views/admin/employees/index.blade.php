@extends('layouts.app')
@section('title', 'Manage Employees')
@section('content')
    <h1>Manage Employees</h1>
    <a href="{{ route('admin.employees.create') }}" class="btn btn-success">Add New Employee</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


