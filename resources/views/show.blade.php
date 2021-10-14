@extends('layout')
@section('content')
<div class="container">
<div class="card">
  <h5 class="card-header" style="text-align: center;">Content</h5>
  <div class="card-body">
        <div class="mb-3">
        <h5 class="card-title">{{ $post->name }}</h5>
        <p class="card-text">{{ $post->description }}</p>
        <p class="card-text" style="font-style: italic;">{{'Category : '. $post->categories->name}}</p>
        </div>
        <hr>
        <div class="mb">
            <a href="/posts" class="btn btn-success">Back</a>
        </div>
  </div>
</div>
</div>

@endsection