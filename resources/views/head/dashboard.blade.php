@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <h1>Dashboard</h1>
    <ul>
        @foreach($summary as $employeeId => $count)
            <li>
                <a href="{{ route('head.updates', $employeeId) }}">Employee {{ $employeeId }}: {{ $count }} updates</a>
            </li>
        @endforeach
    </ul>
@endsection