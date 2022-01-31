@extends('auth.app')

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1">
                MCQ System
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if(session('error'))
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            </div>
            @endif
            <form method="post" action="{{route('login.action')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button><br>
                <small>Don't have any account? please <a href="{{ route('reg.view') }}"> register</a></small>
            </form>
        </div>
    </div>
</div>
@endsection