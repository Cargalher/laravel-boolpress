@extends('layouts.admin')

@section('content')
  <div class="container">
  <h1>Edit post</h1>
  <hr>
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
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="form-group d-flex flex-column">
      <label for="image">Replace Image</label>
      <img width="300" src="{{asset('storage/' .$post->image)}}" class="mb-3 img-thumbnail" alt="">
      <input type="file" name="image" id="image">
    </div>  
    @error('image')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control @error('post_content')is-invalid @enderror" name="post_content" id="post_content" rows="5"> {{ $post->post_content}}</textarea>
    </div>
    @error('post_content')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

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


    <div class="form-group">
      <label for="category_id">Categories</label>
      <select class="form-control" name="category_id" id="category_id">
        <option value="">Select category</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}> {{$category->name}} </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="tags">Tags</label>
      <select multiple class="form-control" name="tags[]" id="tags">
        <option value="" disabled>Select a tag</option>
        @if($tags)
          @foreach($tags as $tag)
          <option value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>{{$tag->name}}</option>
          @endforeach
        @endif
      </select>
    </div>


    <a href="{{route('admin.posts.index')}}" class="mr-4"><i class="fas fa-arrow-left fa-sm fa-fw"></i> Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
  


@endsection
