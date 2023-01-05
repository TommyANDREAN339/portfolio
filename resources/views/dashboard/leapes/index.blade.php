@extends('dashboard.layouts.main')

@section('container')

<div class="table-responsive  ">
    <a href="/dashboard/leapes/create" class="btn btn-primary mb-3">Create new Leave</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($leapes as $leape)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $leape->name }}</td>
           <td> 
            <a href="/dashboard/leapes/{{ $leape->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/leapes/{{ $leape->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/leapes/{{ $leape->slug }}" method="post" class="d-inline">
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