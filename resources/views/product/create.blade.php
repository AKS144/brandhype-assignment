@extends('layout.app')
@section('name', 'Add New Product')
@section('heading', 'Create a New Product')
@section('link_text', 'Goto All Products')
@section('link', '/product')

@section('content')

<div class="row my-3 pt-3">
  <div class="col-lg-6 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-info">
        <h3 class="text-light fw-bold">Add New Product</h3>
      </div>
      <div class="card-body p-4">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="my-2">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <input type="email" name="email" id="email" rows="6" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email-id" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="my-2">
            {{-- <input type="text" name="category_id" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="Category" value="{{ old('category') }}"> --}}
            <select class="custom-select form-control" aria-label="Default select example" name="category_id">
                <option selected>Select Category Name</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="my-2">
            <input name="stock_count" id="stock_count" rows="6" class="form-control @error('stock_count') is-invalid @enderror" placeholder="Enter no. of Stock">
            @error('stock_count')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="my-2">
            <input type="file" name="image" id="file"  class="form-control @error('file') is-invalid @enderror">
            @error('file')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="my-2 text-end pt-3">
            <input type="submit" value="Add Post" class="btn btn-info text-white">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
