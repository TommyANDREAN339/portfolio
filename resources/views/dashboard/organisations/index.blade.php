@extends('dashboard.layouts.main')

@section('container')

<h2>Organisation</h2>

<div class="table-responsive">
    <a href="/dashboard/organisations/create" class="btn btn-primary">create </a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">organisation</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organisations as $organisation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organisation->name }}</td>
                    <td>
                       <a href="/dashboard/organisations/{{ $organisation->slug }}" class="btn btn-primary">show</a>
                       <a href="/dashboard/organisations/{{ $organisation->slug }}/edit" class="btn btn-warning">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection