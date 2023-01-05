@extends('dashboard.layouts.main')

@section('container')
      
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive  ">
    <a href="/dashboard/employees/create" class="btn btn-primary mb-3">Create new Post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">NIK</th>
          <th scope="col">NIP</th>
          <th scope="col">Branch</th>
          <th scope="col">Provider</th>
          <th scope="col">Email</th>
          <th scope="col">Fullname</th>
           <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $employee->title }}</td>
          <td>{{ $employee->NIK }}</td>
          <td>{{ $employee->NIP }}</td>
           <td>{{ $employee->branch->name }}</td>
          <td>{{ $employee->provider->name }}</td>
          <td>{{ $employee->user->email }}</td>
          <td>{{ $employee->user->name }}</td>
          <td> 
            <a href="/dashboard/employees/{{ $employee->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/employees/{{ $employee->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/employees/{{ $employee->slug }}" method="post" class="d-inline">
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