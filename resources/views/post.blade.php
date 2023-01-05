@extends('layouts.main')

@section('container')


<div class="container">
     <div class="row col-mb-4">
          <div class="col-mb-8">
               <h5 class="card-title">{{ $post->title }}</h5>

               <p> <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> at <a href="/posts?city={{ $post->city->slug }}">{{ $post->city->name }}</a></p>

               <img src="http://source.unsplash.com/1500x500?{{ $post->category->name }}" 
               class="img-fluid"             alt="{{ $post->category->name }}">
  
                <article>
       
                    {!! $post->body !!}  

                </article>

          </div>
     </div>
</div>

      
      

@endsection