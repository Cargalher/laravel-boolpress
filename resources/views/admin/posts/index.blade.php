@extends('layouts.admin')

@section('content')
<a class="btn btn-primary fixed-bottom" href="{{route('admin.posts.create')}}" role="button">Create</a>
<div class="table-responsive table-inverse table-striped">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Content</th>
                <th>Published</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
        
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                 <td><img width="100" src="{{asset('storage/' .$post->image)}}" alt="{{$post->title}}"></td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td>{{$post->post_date}}</td>
                <td>{{$post->post_content}}</td>
                <td>{{$post->published}}</td>
                <td>
                    <a href="{{route('admin.posts.show', $post->id)}}" class="d-flex justify-content-between">
                        <i class="fas fa-eye fa-sm fa-fw d-flex align-items-center"></i> View 
                    </a>
                    <a href="{{ route('admin.posts.edit', $post->id)}}" class="d-flex justify-content-between">
                        <i class="fas fa-pencil-alt fa-sm fa-fw d-flex align-items-center"></i> Edit 
                    </a>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                    </form>

                     <!-- <a href="#" class="d-flex justify-content-between">  
                        <i class="fas fa-trash fa-sm fa-fw d-flex align-items-center"></i> Delete 
                    </a> -->
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>



@endsection