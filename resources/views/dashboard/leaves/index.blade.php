@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Leaves</h1>
  </div>

  @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive  ">
    <a href="/dashboard/leaves/create" class="btn btn-primary mb-3">Create new Leave</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
           <th scope="col">by user</th>
           <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($leaves as $leave)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $leave->title }}</td>
           <td>{{ $leave->user->name }}</td>
           <td>{{ $leave->leape->name }}</td>
           <td> 
            <a href="/dashboard/leaves/{{ $leave->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/leaves/{{ $leave->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/leaves/{{ $leave->slug }}" method="post" class="d-inline">
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