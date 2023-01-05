@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Posts</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
              @if(old('category_id', $post->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>  
              @endif  
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">city</label>
          <select class="form-select" name="city_id">
            @foreach ($cities as $city)
              @if(old('city_id', $post->city_id) == $city->id)
                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
              @else
                <option value="{{ $city->id }}">{{ $city->name }}</option>  
              @endif  
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="provider2" class="form-label">Provider2</label>
          <select class="form-select" name="provider2_id">
            @foreach ($provider2s as $provider2)
              @if(old('provider2_id', $post->provider2_id) == $provider2->id)
                <option value="{{ $provider2->id }}" selected>{{ $provider2->name }}</option>
              @else
                <option value="{{ $provider2->id }}">{{ $provider2->name }}</option>  
              @endif  
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
              <p class="text-danger">{{ $message }}</p>
          @enderror    
          <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>

       
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
     fetch('/dashboard/posts/checkSlug?title=' + title.value)
     .then(response => response.json())
     .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>

@endsection