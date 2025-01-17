@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Login</div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form id="form-admin" method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label class="lab-admin" for="loginservice">Login Service</label>
                            <input type="text" class="form-control input" id="loginservice" name="loginservice" required>
                        </div>
                        <div class="form-group">
                            <label class="lab-admin" for="password">Password</label>
                            <input type="password" class="form-control input" id="password" name="password" required>
                        </div>
                        <div class="form-group form-check" style="display: block;">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
