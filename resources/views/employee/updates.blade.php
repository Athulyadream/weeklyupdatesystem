@extends('layouts.app')
@section('title', 'Submit Update')
@section('content')
    <h1>Submit Weekly Update</h1>
    <form action="{{ route('employee.updates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="update_text">Update Text</label>
            <textarea name="update_text" id="update_text" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="update_file">Attach File</label>
            <input type="file" name="update_file" id="update_file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection