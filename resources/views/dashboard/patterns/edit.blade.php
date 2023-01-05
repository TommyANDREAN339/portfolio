@extends('dashboard.layouts.main')

@section('container')

<form action="/dashboard/patterns/{{ $pattern->slug }}" method="post">
  @method('put')
  @csrf
  <div class="mh-3">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" required value="{{ old('title', $pattern->title) }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mh-3">
    <label for="slug">Slug</label>
    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old('slug', $pattern->slug) }}">
    @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mh-3">
    <label for="city" class="form-label">City</label>
    <select name="city_id" class="form-select">
        @foreach ($cities as $city)
        @if(old('city_id', $pattern->city_id) == $city->id)
        <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
        @else
        <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mh-3">
    <label for="organisation" class="form-label">Organisation</label>
    <select name="organisation_id" class="form-select">
        @foreach ($organisations as $organisation)
        @if(old('organisation_id', $pattern->organisation_id) == $organisation->id)
        <option value="{{ $organisation->id }}" selected>{{ $organisation->name }}</option>
        @else
        <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mh-3">
    <label for="unit" class="form-label">Unit</label>
    <select name="unit_id" class="form-select">
        @foreach ($units as $unit)
        @if(old('unit_id', $pattern->unit_id) == $unit->id)
        <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
        @else
        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mh-3">
    <label for="position" class="form-label">Position</label>
    <select name="position_id" class="form-select">
        @foreach ($positions as $position)
        @if(old('position_id', $pattern->position_id) == $position->id)
        <option value="{{ $position->id }}" selected>{{ $position->name }}</option>
        @else
        <option value="{{ $position->id }}">{{ $position->name }}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mh-3">
    <label for="body">Body</label>
    @error('body')
       <div class="btn-danger">{{ $message }}</div>
    @enderror
    <input name="body" type="hidden" id="body" value="{{ old('body', $pattern->body) }}">
    <trix-editor input="body"></trix-editor>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    
@endsection