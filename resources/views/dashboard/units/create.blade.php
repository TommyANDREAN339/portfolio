@extends('dashboard.layouts.main')

@section('container')
     
  <h3>create unit</h3>

   <form action="/dashboard/units" method="post">
       @csrf
       <div class="mh-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
       </div>
       <div class="mh-3">
        <label for="slug">slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old('slug') }}">
        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
       </div>
       <button type="submit" class="btn btn-primary">create unit</button>
   </form>   

@endsection