@extends('dashboard.layouts.main')

@section('container')

<form action="/dashboard/leaves/{{ $leave->slug }}" method="post">
   @method('put')
   @csrf
   <div class="mh-3">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" required value="{{ old('title', $leave->title) }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
   </div>
   <div class="mh-3">
    <label for="slug">slug</label>
    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old('slug', $leave->slug) }}">
    @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
   </div>
   <div class="mh-3">
    <label for="leape" class="form-label">Leape</label>
    <select name="leape_id" class="form-select">
        @foreach ($leapes as $leape)
        @if(old('leape_id', $leave->leape_id) == $leape->id)
        <option value="{{ $leape->id }}" selected>{{ $leape->name }}</option>
        @else
        <option value="{{ $leape->id }}">{{ $leape->name }}</option>
        @endif
        @endforeach
    </select>
   </div>
   <button type="submit" class="btn btn-primary">update</button>
</form>
    
@endsection