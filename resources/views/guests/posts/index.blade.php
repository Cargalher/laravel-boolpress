@extends('layouts.app')


@section('content')

<div class="jumbotron">
  <h1 class="display-3 text-center">News</h1>
</div>


<section class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card text-left">
              <a href="{{route('posts.show', $post->id)}}">
                <img class="card-img-top" src="{{asset('storage/' .$post->image)}}" alt="{{$post->title}}">
              </a>
              <div class="card-body">
                <h4 class="card-title">{{$post->title}}</h4>
                <p class="card-text">{{ substr(strip_tags($post->post_content), 0, 200)}}
                <a href="{{route('posts.show', $post->id)}}">{{ strlen(strip_tags($post->post_content)) > 50 ? '...ReadMore' : '' }} </a>
                </p>
              </div>
            </div>
        </div>
        @endforeach   
    </div>
    {{$posts->links()}}
</section>

   




@endsection


