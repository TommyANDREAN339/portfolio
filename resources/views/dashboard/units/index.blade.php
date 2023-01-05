@extends('dashboard.layouts.main')

@section('container')
   

<h3>Units</h3>

  <div class="table-responsive">
    <a href="/dashboard/units/create" class="btn btn-primary">create unit</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($units as $unit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $unit->name }}</td>
                    <td>
                       <a href="/dashboard/units/{{ $unit->slug }}" class="btn btn-primary"><span data-feather="eye"></span></a>
                       <a href="/dashboard/units/{{ $unit->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                       <form action="dashboard/units/{{ $unit->slug }}" method="post">
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