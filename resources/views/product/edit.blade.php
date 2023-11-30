@extends('layout.app')
@section('title', 'Edit Product')
@section('heading', 'Edit This Product')
@section('link_text', 'Goto All Product')
@section('link', '/product')

@section('content')

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h3 class="text-light fw-bold">Edit product</h3>
      </div>
      <div class="card-body p-4">
        <form action="/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $product->name }}" required>
          </div>

          <div class="my-2">
            {{-- <input type="text" name="category_id" id="category" class="form-control" placeholder="Category" value="{{ $product->category->name }}" required> --}}
            {{-- <h5>Category Name <span class="text-danger">*</span></h5> --}}
            <select class="form-control" aria-label="Default select example" name="category_id">
                <option selected>Select Category Name</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

          <div class="my-2">
            <input name="stock_count" id="stock_count" rows="6" class="form-control @error('stock_count') is-invalid @enderror" placeholder="Enter no. of Stock" value="{{$product->stock_count}}">
            @error('stock_count')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <input type="file" name="imafe" id="image" accept="image/*" class="form-control">
          </div>

          <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid img-thumbnail" width="250" height="250">


          <div class="my-2">
            <input type="submit" value="Update product" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
