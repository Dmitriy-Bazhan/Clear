@extends('site.layouts.auth-layout')

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-4 offset-4">

                <h1>Login</h1></div>

        </div>

        <div class="row">

            <div class="col-4 offset-4">



                <form method="POST" action="{{ url('/login') }}">

                    @csrf

                    @error('email')

                    <span style="color: red; font-size: 12px;">{{ $message }}</span>

                    @enderror

                    <div class="form-group">

                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('register') }}">Register</a>

                </form>

            </div>

        </div>

    </div>

@endsection
