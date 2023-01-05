@extends('dashboard.layouts.main')

@section('container')

<div class="mh-3">
    <form action="/dashboard/employees" method="post">
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
        <label for="slug">Slug</label>
        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mh-3">
        <input type="text" name="NIK" class="form-control @error('NIK') is-invalid @enderror" id="NIK" placeholder="NIK" required value="{{ old('NIK') }}">
        <label for="NIK">NIK</label>
        @error('NIK')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mh-3">
        <input type="text" name="NIP" class="form-control @error('NIP') is-invalid @enderror" id="NIP" placeholder="NIP" required value="{{ old('NIP') }}">
        <label for="NIP">NIP</label>
        @error('NIP')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mh-3">
        <label for="branch" class="form-label">Branch</label>
        <select name="branch_id" class="form-select">
            @foreach ($branches as $branch)
            @if(old('branch_id') == $branch->id)
            <option value="{{ $branch->id }}" selected>{{ $branch->name }}</option>
            @else
            <option value="{{ $branch->id }}"  >{{ $branch->name }}</option>
            @endif
            @endforeach
        </select>
      </div>
      <div class="mh-3">
        <label for="provider" class="form-label">provider</label>
        <select name="provider_id" class="form-select">
            @foreach ($providers as $provider)
            @if(old('provider_id') == $provider->id)
            <option value="{{ $provider->id }}" selected>{{ $provider->name }}</option>
            @else
            <option value="{{ $provider->id }}"  >{{ $provider->name }}</option>
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
      <button type="submit" class="btn btn-primary">create</button>
    </form>
</div>
    
@endsection