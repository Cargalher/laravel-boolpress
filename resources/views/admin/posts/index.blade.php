@extends('layouts.admin')

@section('content')

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Author</th>
                <th>Date</th>
                <th>Content</th>
                <th>Published</th>

            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><img width="100" src="{{$post->image}}" alt="{{$post->title}}"></td>
                <td>{{$post->author}}</td>
                <td>{{$post->post_date}}</td>
                <td>{{$post->post_content}}</td>
                <td>{{$post->published}}</td>
                <td>
                    <a href="#">View</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>



@endsection