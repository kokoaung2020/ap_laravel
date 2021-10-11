@extends('layout')
@section('content')
<style>
  .form-error{
    border: 1px solid red;
  }
</style>
<div class="container">
<div class="card">
  <h5 class="card-header" style="text-align: center;">New Post</h5>
  <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
    <form action="/posts" method="post">
        @csrf
        <div class="input-group mb-3">
        <span class="input-group-text">Name</span>
        <input type="text" class="form-control {{($errors->first('name') ? "form-error" : "")}}" name="name" placeholder="Enter Name" value="{{ old('name') }}">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <textarea class="form-control {{($errors->first('description') ? "form-error" : "")}}" name="description" placeholder="Enter Desc">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/posts" class="btn btn-success">Back</a>
    </form>
  </div>
</div>
</div>

@endsection