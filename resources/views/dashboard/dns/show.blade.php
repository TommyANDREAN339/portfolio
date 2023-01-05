@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
         <div class="col-mb-8">
              <h5 class="mb-3">{{ $post->title }}</h5>

              <a href="/dashboard/dns" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
              <a href="/dashboard/dns/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
              <form action="/dashboard/dns/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')"
                  ><span data-feather="x-circle"></span>Delete</button>
              </form>              
              

 
               <article class="my-3 fs-5">
      
                    {!! $post->body !!} 

               </article>

         </div>
    </div>
</div>

@endsection