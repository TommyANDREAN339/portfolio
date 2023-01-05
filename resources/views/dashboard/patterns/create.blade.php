@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

   <form action="/dashboard/patterns" method="post">
    @csrf
      
     <div class="mh-3">
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" required value="{{ old('title') }}">
        <label for="title">Title</label>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
     </div>
     <div class="mh-3">
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old('slug') }}">
        <label for="slug">slug</label>
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
              @if (old('city_id') == $city->id)
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
              @if(old('organisation_id') == $organisation->id)
              <option value="{{ $organisation->id }}" selected>{{ $organisation->name }}</option>
              @else
              <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
              @endif
          @endforeach
        </select>
     </div>
     <div class="mh-3">
        <label for="unit" class="form-label">unit</label>
        <select name="unit_id" class="form-select">
          @foreach ($units as $unit)
              @if(old('unit_id') == $unit->id)
              <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
              @else
              <option value="{{ $unit->id }}">{{ $unit->name }}</option>
              @endif
          @endforeach
        </select>
     </div>
     <div class="mh-3">
        <label for="position" class="form-label">position</label>
        <select name="position_id" class="form-select">
          @foreach ($positions as $position)
              @if(old('position_id') == $position->id)
              <option value="{{ $position->id }}" selected>{{ $position->name }}</option>
              @else
              <option value="{{ $position->id }}">{{ $position->name }}</option>
              @endif
          @endforeach
        </select>
     </div>
     <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror    
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
      </div>

     
      <button type="submit" class="btn btn-primary">Create new Post</button>
   </form>
    
@endsection