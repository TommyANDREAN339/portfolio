@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

<div class="col-lg-8">


        <form action="/dashboard/dns" method = "post">
         @csrf
          <div class="mb-3">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
             id="title" placeholder="title" value="{{ old('title') }}">
             <label for="title">Title</label>
             @error('title')
                 <div class="invalid-feedback">
                    {{ $message }}
                 </div>
             @enderror
          </div>
          <div class="mb-3">
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" 
             id="slug" placeholder="slug" value="{{ old('slug') }}">
             <label for="Slug">Slug</label>
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
                @if(old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>  
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
          <button type = "submit" class= "btn btn-primary">Create new Post</button>

        </form>

    </div>
</div>
    
<script>

  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  this. addEventListener('change', function() {
      fetch('/dashboard/dns/checkSlug?title=' + title.value);
      .then( response => response.json())
      .then( data => slug.value = data.slug)
  });

</script>

@endsection