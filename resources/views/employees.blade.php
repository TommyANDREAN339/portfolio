@extends('layouts.main')

@section('container')

<div class="justified-content-center">
  <div class="col-md-8">

     <form action="/employees">
       @csrf
       @if(request('provider'))
       <input type="hidden" name="provider" value="{{ request('provider') }}">
       @endif
       @if(request('branch'))
       <input type="hidden" name="branch" value="{{ request('branch') }}">
       @endif
       @if(request('user'))
       <input type="hidden" name="user" value="{{ request('user') }}">
       @endif
       <div class="mh-3">
        <input type="text" name="search" class="form-control" id="search" placeholder="search" required value="{{ old('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
       </div>
     </form>

  </div>
</div>
    
<div class="container">
    <div class="row">
      @foreach ($employees as $employee)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 7)"><a href="/employees?provider={{ $employee->provider->slug }}" class="text-decoration-none">{{ $employee->provider->name }}</a></div>
            <img src="http://source.unsplash.com/500x500?{{ $employee->provider->name }}" 
            class="card-img-top" alt="{{ $employee->provider->name }}">
          <div class="card-body">
            <h1 class="card-title">{{ $employee->title }}</h1>
            <p>
              <small class="text-muted">
                <p>  at <a href="/employees?provider={{ $employee->provider->slug }}">{{ $employee->provider->name }}</a> in <a href="/employees?branch={{ $employee->branch->slug }}">{{ $employee->branch->name }}</a> in <a href="/employees?user={{ $employee->user->username }}">{{ $employee->user->name }}</a>
                   {{ $employee->created_at->diffForhumans() }}</p>
              </small>
            </p>
             <h5 class="card-text">{{ $employee->excerpt }}</h5>
             <p><a href="/employees/{{ $employee->slug }}">read more</a></p>
            </div>  
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection