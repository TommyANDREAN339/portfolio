@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row justify-content-center col-mb-3">
    <div class="col-md-6">
      <form action="/posts">
         @if( request('category'))
           <input type="hidden" name="category" value="{{ request('category') }}">
         @endif
         @if( request('user'))
            <input type="hidden" name="user" value="{{ request('user') }}">
         @endif
         @if( request('city'))
            <input type="hidden" name="city" value="{{ request('city') }}">
         @endif
         @if( request('provider2'))
            <input type="hidden" name="city" value="{{ request('provider2') }}">
         @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="search...." name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">search</button>
          </div>
      </form>
    </div>
  </div>

<div class="container">
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></div>
          <img src="http://source.unsplash.com/500x500?{{ $post->category->name }}" 
          class="card-img-top" alt="{{ $post->category->name }}">
        <div class="card-body">
          <h1 class="card-title">{{ $post->title }}</h1>
          <p>
            <small class="text-muted">
              <p>by <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> at <a href="/posts?city={{ $post->city->slug }}">{{ $post->city->name }}</a>
                in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                in <a href="/posts?provider2={{ $post->provider2->slug }}">{{ $post->provider2->name }}</a>
                 {{ $post->created_at->diffForhumans() }}</p>
            </small>
          </p>
           <h5 class="card-text">{{ $post->excerpt }}</h5>
           <p><a href="/posts/{{ $post->slug }}">read more</a></p>
          </div>  
        </div>
      </div>
    @endforeach
  </div>
</div>

<div class="d-flex" justify-content-end>
{{ $posts->links() }}
</div>
 
@endsection