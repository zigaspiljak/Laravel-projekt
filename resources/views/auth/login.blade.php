@extends('layouts.master')
@section('title', 'Login')

@push('styles')
<link href="css/login_register.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid body-content" style="padding: auto !important;">
    <div class="container" style="display: block; text-align: center;">
        <div class="container-inner">
            <form id="login_forum" class="login_forum" method="POST" action=""
                enctype="multipart/form-data">
                <h1>Login</h1>
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
                        <label for="password">Password:</label>
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
                    <div class="form-group button-form">
                        <button type="submit" name="btnsubmit" class="btn btn-custom">
                            Login
                        </button>
                    </div>
                </div>
                @if (session('error'))
                <div class="container inner-forum">
                    <div class="form-group button-form">
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
                @endif
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
