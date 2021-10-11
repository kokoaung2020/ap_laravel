@extends('layout')
@section('content')
<div class="container">
  <div class="mb-3">
    <a href="/posts/create" class="btn btn-success">New Post</a>
  </div>
<div class="card">
  <h5 class="card-header" style="text-align: center;">Content</h5>
  <div class="card-body">
    @foreach($data as $post)
        <div class="mb-3">
        <h5 class="card-title">{{ $post->name }}</h5>
        <p class="card-text">{{ $post->description }}</p>
        <div class="row">
          <div class="col-1">
        <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
          </div>
          <div class="col-1">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
          </div>
          <div class="col-1">
        <form action="/posts/{{$post->id}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
          </div>
        </div>
        </div><hr>
    @endforeach
  </div>
</div>
</div>

@endsection