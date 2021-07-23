@extends('layouts.admin')

@section('content')
<h1>Edit post</h1>
@if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title" aria-describedby="titleHelper" placeholder="Add a title" value="{{$post->title}}" minlength=”5” max=” 255” required>
  <small id="titleHelper" class="form-text text-muted">Type a title for the post, max 255 characters</small>
</div>  

<div class="form-group">
  < <label for="image">Image</label>
  <img src="{{asset('storage/' .$post->image)}}" alt="">
  <input type="file" name="image" id="image">
</div>  

<div class="form-group">
    <label for="post_content">Content</label>
    <textarea class="form-control @error('post_content')is-invalid @enderror" name="post_content" id="post_content" rows="5"> {{ $post->post_content}}</textarea>
</div>

<div class="form-group">
  <label for="author">Author</label>
  <input type="text" class="form-control @error('author')is-invalid @enderror" name="author" id="author" aria-describedby="authorHelper" placeholder="Add the author name" value="{{$post->author}}">
  <small id="authorHelper" class="form-text text-muted">Type the author name</small>
</div> 

<div class="form-group">
  <label for="post_date">Post Date</label>
  <input type="text" class="form-control  @error('post_date')is-invalid @enderror" name="post_date" id="post_date" aria-describedby="post_dateHelper" placeholder="Add date of the post" value="{{old('post_date')}}">
  <small id="post_dateHelper" class="form-text text-muted">Type Post date</small>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>


@endsection