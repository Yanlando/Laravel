@extends('layouts.body')
@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <form action="/register" method="POST">
                @csrf
              <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3"  type="submit">Register</button>
            </form>
            <small class="d-block text-center">Already Registered? <a href="/login">Login Now</a></small>
          </main>
    </div>
</div>


@endsection