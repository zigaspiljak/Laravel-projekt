@extends('layouts.master')
@section('title', 'Register')

@push('styles')
<link href="css/login_register.css" rel="stylesheet">
@endpush

@section('content')

<div class="container-fluid body-content" style="padding: auto !important;">
    <div class="container" style="display: block; text-align: center;">
        <div class="container-inner">
            <form id="login_forum" class="login_forum" method="POST" action="{{ route('post.register')}}"
                enctype="multipart/form-data">
                <h1>Register</h1>

                <div class="container inner-forum">
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" id="username" name="name" autocomplete="off"
                            required="">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="container inner-forum">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="container inner-forum">
                    <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                            required="">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="container inner-forum">
                    <div class="form-group">
                        <label>Admin</label>
                        <input type="checkbox" class="form-control" id="admin" name="admin" autocomplete="off">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('admin'))
                        <span class="text-danger">{{ $errors->first('admin') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group button-form">
                    <button type="submit" name="btnsubmit" class="btn btn-custom">
                        Register
                    </button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

@endsection
