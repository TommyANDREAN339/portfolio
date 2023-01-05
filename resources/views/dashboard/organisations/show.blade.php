@extends('dashboard.layouts.main')

@section('container')
 

   {{ $organisation->name }}

   <br><br>

 <a href="/dashboard/organisations" class="btn btn-primary">kembali</a>
 

@endsection