
@extends('layouts.master')
@section('title', 'Add Project')
@section('content')
<h1 class="site_header">Add Project</h1>
<form method="POST" action="{{ route("post.add_project") }}" class="form">
    <div>
        <label for="name">Project Name</label><br>
        <input type="text" id="username" name="name" autocomplete="off"
            required=""><br><br>
        <button type="submit" name="btnAdd" class="btn btn-add">Add</button>
    </div>
    <div>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    @csrf
</form>
@endsection


