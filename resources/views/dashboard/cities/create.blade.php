@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

<div class="col-mb-8">
<form action="/dashboard/cities" method="post" class="mb-5">
  @csrf
  <div class="mb-3">
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"    value="{{ old('name') }}"  required>
    <label for="name">Name</label>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"   value="{{ old('slug') }}"
    required >
    <label for="slug">Slug</label>
    @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>

  <button class="btn btn-primary" type="submit">Create</button>
</form>
</div>

 

@endsection