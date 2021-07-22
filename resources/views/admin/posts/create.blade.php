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
  <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelperr" placeholder="Add a title" value="{{old('title')}}">
  <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
</div>  

<div class="form-group">
  <label for="image">Cover Image</label>
  <input type="text" class="form-control" name="image" id="image" aria-describedby="imageHelperr" placeholder="Add an image" value="{{old('image')}}">
  <small id="imageHelperr" class="form-text text-muted">Type a image url for the post, max 255 characters</small>
</div>  

<div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body" rows="5"> {{ old('body')}}</textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
