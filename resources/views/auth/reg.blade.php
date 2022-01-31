@extends('auth.app')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="" class="h1">
            MCQ System
        </a>
    </div>
    <div class="card-body">
        <h2 class="login-box-msg">Registration</h2>
        @if (count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{route('reg.action')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email"
                    placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirmation</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Signup</button><br>
            <span>Already Got an account? <a href="{{route('login.view')}}">Login Here</a></span>
        </form>
    </div>
</div>
@endsection