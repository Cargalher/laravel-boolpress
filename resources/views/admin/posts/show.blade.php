@extends('layouts.admin')

@section('content')
<div class="container">
    <img src="{{asset('storage/' .$post->image)}}" alt="">
    <h1 class="display-1">{{$post->title}}</h1>
    <p class="lead">{{$post->post_content}}</p>

    <a href="{{route('admin.posts.index')}}" class="mr-4"><i class="fas fa-arrow-left fa-sm fa-fw"></i> Back</a>
    <a href="{{route('admin.posts.edit', $post->id)}}" class=”text-muted”>Edit <i class="far fa-edit"></i></a>
</div>



@endsection
