@extends('layouts.app')


@section('content')

<div class="container">
<h1>Write Me!</h1>
<p>If you want to contact me fill in the following form</p>
@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{{session('message')}}</strong> 
    </div>
    
    <script>
      $(".alert").alert();
    </script>
@endif
@include('partials.errors')
<form action="{{route('contacts.send')}}" method="post">
@csrf
<div class="form-group">
  <label for="full_name">Full Name*</label>
  <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Leonardo Celia"
    aria-describedby="fullNameHelper" minlength="5" maxlength="255" value="{{old('full_name')}}" required>
  <small id="fullNameHelper" class="text-muted">Type your Full Name</small>
</div>
<div class="form-group">
  <label for="email">Email Address*</label>
  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
   placeholder="example@example.com" value="{{old('email')}}" required>
  <small id="emailHelpId" class="form-text text-muted">Type your email</small>
</div>
<div class="form-group">
  <label for="message">Message*</label>
  <textarea class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
</div>

<button type="submit" class="btn btn-primary btn-block">Send <i class="far fa-paper-plane"></i> </button>
</form>
</div>

@endsection