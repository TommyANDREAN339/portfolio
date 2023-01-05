@extends('layouts.main')

@section('container')

<main class="form-registration w-100 m-auto">
  <h1 class="h3 mb-3 fw-forward text-center">Registration Form</h1>  
  <form action="/register" method="post">
      @csrf 
      <div class="form-floating">
        <input type="text" name="username"  class="form-control @error('username') is-invalid     
        @enderror" id="username" placeholder="username" required>
        <label for="username">Username</label>
        @error('username')
        <div class="invalid-error">
        {{ $message }}  
        </div>    
        @enderror
      </div>
      <div class="form-floating">
        <input type="text" name="name"  class="form-control @error('name') is-invalid     
        @enderror" id="name" placeholder="name">
        <label for="name">Name</label>
        @error('name')
        <div class="invalid-error">
        {{ $message }}  
        </div>    
        @enderror
      </div>
      <div class="form-floating">
        <input type="email" name="email"  class="form-control @error('email') is-invalid     
        @enderror" id="email" placeholder="email">
        <label for="email">Email address</label>
        @error('email')
        <div class="invalid-error">
        {{ $message }}  
        </div>    
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid     
        @enderror" id="password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
        <div class="invalid-error">
        {{ $message }}  
        </div>    
        @enderror
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a>></small>
  </main>
  
    
@endsection