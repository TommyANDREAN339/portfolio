@extends('layouts.main')

@section('container')

<div class="container">
  <div class="row">
    <form action="/parts" >
@if (request('organisation'))
    <input type="hidden" name="organisation" value="{{ request('organisation') }}">
@endif
@if (request('branch'))
    <input type="hidden" name="branch" value="{{ request('branch') }}">
@endif
     <div class=" input-group mb-3">
      <input type="text" name="search" class="form-control"   placeholder="search" value="{{ request('search') }}">
       <button type="submit" class="btn btn-danger"></button>
     </div>
    </form>
  </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($parts as $part)
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="position-absolute bg-dark px-3 py-2" style="background-color: black"> <a href="/parts?organisation={{ $part->organisation->slug }}">{{ $part->organisation->name }}</a></div>
              <img src="http://source.unsplash.com/500x500?{{ $part->organisation->name }}" 
              class="card-img-top" alt="{{ $part->organisation->name }}">
                
                <div class="card-body">
                <h2 class=""></h2>
               
                <h3 class="card-title">{{ $part->title }}</h3>

                <p>
                  <small>
                   in <a href="/parts?organisation={{ $part->organisation->slug }}">{{ $part->organisation->name }}</a> in <a href="/parts?branch={{ $part->branch->slug }}">{{ $part->branch->name }}</a>
                  </small>
                </p>

                <h6 class="card-text">{{ $part->excerpt }}</h6>

                <a class="btn btn-primary" href="/parts/{{ $part->slug }}">read more</a>
                </div>
            </div>
          </div>
            


        @endforeach
    </div>
</div>
    
@endsection