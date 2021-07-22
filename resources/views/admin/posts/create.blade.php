@extends('layouts.admin')

@section('content')
@if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<h1>Create a new post</h1>

<form action="{{route('admin.posts.store')}}" method="post">
  @csrf
<div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control  @error('title')is-invalid @enderror" name="title" id="title" aria-describedby="titleHelper" placeholder="Add a title" value="{{old('title')}}">
  <small id="titleHelper" class="form-text text-muted">Type a title for the post, max 255 characters</small>
</div>  

<div class="form-group">
  <label for="image">Cover Image</label>
  <input type="text" class="form-control  @error('title')is-invalid @enderror" name="image" id="image" aria-describedby="imageHelper" placeholder="Add an image" value="{{old('image')}}">
  <small id="imageHelper" class="form-text text-muted">Type a image url for the post, max 255 characters</small>
</div>  

<div class="form-group">
    <label for="post_content">Content</label>
    <textarea class="form-control  @error('title')is-invalid @enderror" name="post_content" id="post_content" rows="5"> {{ old('post_content')}}</textarea>
</div>

<div class="form-group">
  <label for="author">Author</label>
  <input type="text" class="form-control  @error('title')is-invalid @enderror" name="author" id="author" aria-describedby="authorHelper" placeholder="Add author's name" value="{{old('author')}}">
  <small id="authorHelper" class="form-text text-muted">Type the author's name</small>
</div>

<div class="form-group">
  <label for="post_date">Post Date</label>
  <input type="text" class="form-control  @error('post_date')is-invalid @enderror" name="post_date" id="post_date" aria-describedby="post_dateHelper" placeholder="Add date of the post" value="{{old('post_date')}}">
  <small id="post_dateHelper" class="form-text text-muted">Type Post date</small>
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
