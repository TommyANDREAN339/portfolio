@extends('dashboard.layouts.main')

@section('container')

<form action="/dashboard/leapes" method="post">
    @csrf
    <div class="mh-3">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old("name") }}">
        <label for="name">Name</label>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mh-3">
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old("slug") }}">
        <label for="slug">Slug</label>
        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
     <button type="submit" class="btn btn-primary">Create New Leave Type</button>
</form>
    
@endsection