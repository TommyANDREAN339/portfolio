@extends('layouts.main')

@section('container')

<form action="/leaves">
    @csrf
    @if(request('user'))
    <input type="hidden" name="user" value="{{ request('user') }}">
    @endif
    @if(request('leape'))
    <input type="hidden" name="leape" value="{{ request('leape') }}">
    @endif
     
    <div class="mh-3">
     <input type="text" name="search" class="form-control" id="search" placeholder="search" required value="{{ old('search') }}">
     <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>

<div class="container">
    <div class="row">
      @foreach ($leaves as $leave)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 7)"><a href="/leaves?user={{ $leave->user->username }}" class="text-decoration-none">{{ $leave->user->name }}</a></div>
            <img src="http://source.unsplash.com/500x500?{{ $leave->user->name }}" 
            class="card-img-top" alt="{{ $leave->user->name }}">
          <div class="card-body">
            <h1 class="card-title">{{ $leave->title }}</h1>
            <p>
              <small class="text-muted">
                <p>by <a href="/leaves?user={{ $leave->user->username }}">{{ $leave->user->name }}</a>  type <a href="/leaves?leape={{ $leave->leape->slug }}">{{ $leave->leape->name }}</a>
                    {{ $leave->created_at->diffForhumans() }}</p>
              </small>
            </p>
              <p><a href="/leave/{{ $leave->slug }}" class="btn btn-primary">read more</a></p>
            </div>  
          </div>
        </div>
      @endforeach
    </div>
  </div>
    
@endsection