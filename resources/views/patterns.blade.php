@extends('layouts.main')

@section('container')
       
<div class="row justify-content-center col-mb-3">
    <div class="col-md-6">
      <form action="/patterns">
        @if( request('city'))
        <input type="hidden" name="city" value="{{ request('city') }}">
     @endif
        @if( request('organisation'))
        <input type="hidden" name="organisation" value="{{ request('organisation') }}">
     @endif
        @if( request('unit'))
        <input type="hidden" name="unit" value="{{ request('unit') }}">
     @endif
        @if( request('position'))
        <input type="hidden" name="position" value="{{ request('position') }}">
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
      @foreach ($patterns as $pattern)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 7)"><a href="/patterns?city={{ $pattern->city->slug }}" class="text-decoration-none">{{ $pattern->city->name }}</a></div>
            <img src="http://source.unsplash.com/500x500?{{ $pattern->city->name }}" 
            class="card-img-top" alt="{{ $pattern->city->name }}">
          <div class="card-body">
            <h1 class="card-title">{{ $pattern->title }}</h1>
            <p>
              <small class="text-muted">
                <p>  at <a href="/patterns?city={{ $pattern->city->slug }}">{{ $pattern->city->name }}</a> in <a href="/patterns?organisation={{ $pattern->organisation->slug }}">{{ $pattern->organisation->name }}</a> in 
                  <a href="/patterns?unit={{ $pattern->unit->slug }}">{{ $pattern->unit->name }}</a> in <a href="/patterns?position={{ $pattern->position->slug }}">{{ $pattern->position->name }}</a>
                  
                   {{ $pattern->created_at->diffForhumans() }}</p>
              </small>
            </p>
             <h5 class="card-text">{{ $pattern->excerpt }}</h5>
             <p><a href="/patterns/{{ $pattern->slug }}">read more</a></p>
            </div>  
          </div>
        </div>
      @endforeach
    </div>
  </div>


@endsection