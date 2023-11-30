@extends('layout.app')
@section('title', 'Edit Category')
@section('heading', 'Edit This Category')
@section('link_text', 'Goto All Category')
@section('link', '/category')

@section('content')

<div class="row my-3">
  <div class="col-lg-4 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-info">
        <h3 class="text-light fw-bold">Edit Category</h3>
      </div>
      <div class="card-body p-4">
        <form action="/category/{{ $category->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $category->name }}" required>
          </div>

          <div class="my-2 pt-3 text-end">
            <input type="submit" value="Update Post" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
