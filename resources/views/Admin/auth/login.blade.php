@extends('admin.auth')

@section('title', 'Login')

@section('body-class', 'hold-transition login-page')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 class="h1"><b>Login</b></h1>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            autocomplete="username" value="admin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            autocomplete="current-password" value="12345">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ route('register.show') }}" class="link text-center" data-page="login">Create an
                        Account?</a>
                </p>
            </div>
        </div>
    </div>
@endsection
