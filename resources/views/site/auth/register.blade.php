@extends('site.layouts.auth-layout')

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-4 offset-4">

                <h1>REGISTER</h1>

            </div>

        </div>

        <div class="row">

            <div class="col-4 offset-4">

                <form method="POST" action="{{ url('/register') }}">

                    @csrf

                    @error('*')

                    <span style="color: red; font-size: 12px;">{{ $message }}</span>

                    @enderror

                    <div class="form-group">

                        <label for="exampleInputName">Name</label>
                        <input type="tetx" class="form-control" id="exampleInputName" name="name" value="{{ old('name') }}">

                    </div>

                    <div class="form-group">

                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required autocomplete="new-password" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" required autocomplete="new-password" >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>


    </div>

@endsection
