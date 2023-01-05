@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts Branchs</h1>
  </div>

  @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive">
    <a href="/dashboard/branchs/create" class="btn btn-primary mb-3">Create new Branch</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Branch Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($branches as $branch)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $branch->name }}</td>
          <td> 
            <a href="/dashboard/branchs/{{ $branch->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/branchs/{{ $branch->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/branchs/{{ $branch->slug }}" method="post" class="d-inline">
               @method('delete')
               @csrf
               <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"
               ><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection