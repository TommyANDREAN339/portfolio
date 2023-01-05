@extends('layouts.main')

@section('container')


<div class="container">
     <div class="row col-mb-4">
          <div class="col-mb-8">
               <h5 class="card-title">{{ $pattern->title }}</h5>

               <p>   at <a href="/patterns?city={{ $pattern->city->slug }}">{{ $pattern->city->name }}</a></p>

               <img src="http://source.unsplash.com/1500x500?{{ $pattern->city->name }}" 
               class="img-fluid"             alt="{{ $pattern->city->name }}">
  
                <article>
       
                    {!! $pattern->body !!}  

                </article>

          </div>
     </div>
</div>

      
      

@endsection