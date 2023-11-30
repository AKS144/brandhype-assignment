@extends('layout.app')
@section('name', 'Add New Category')
@section('heading', 'Create a New Category')
@section('link_text', 'Goto All Category')
@section('link', '/category')

@section('content')

<div class="row my-3 pt-3">
  <div class="col-lg-4 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-info">
        <h3 class="text-light fw-bold">Add New Category</h3>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="my-2">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2 text-end pt-3">
            <input type="submit" value="Add Post" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
