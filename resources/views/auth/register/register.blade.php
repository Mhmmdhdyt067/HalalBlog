@extends('main')
@section('container')
<div class="row justify-content-center p-5 mt-5">
    <div class="col-lg-5">
        
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" value={{ old('name') }}>
                  <label for="name">Name</label>
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="username" required value={{ old('username') }}>
                  <label for="username">Username</label>
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="E-mail" required value={{ old('email') }}>
                  <label for="email">E-mail</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Register? <a href="/login" class="text-decoration-none">Login Now!</a></small>
          </main>
    </div>
</div>
@endsection