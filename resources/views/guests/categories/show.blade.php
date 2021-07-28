@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-3"> Posts about {{$category->name}}</h1>
</div>
<div class="posts-category container">
   
    @forelse($category->posts as $post)
        <div class="card">
            <img class="card-img-top" src="{{asset('storage/' .$post->image)}}" alt="{{$post->title}} image">
            <div class="card-body">
                <h4 class="card-title">{{$post->title}}</h4>
                <p class="card-text">
                    {{ substr(strip_tags($post->post_content), 0, 200)}}
                    <a href="{{route('posts.show', $post->id)}}">{{ strlen(strip_tags($post->post_content)) > 50 ? '...ReadMore' : '' }} </a>
                </p>
            </div>
        </div>

    @empty
    <p>Nothing to see here</p>
    @endforelse
    <a href="{{route('posts.index')}}">Back</a>
</div>


@stop