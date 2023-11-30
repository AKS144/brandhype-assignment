@extends('layout.app')
@section('title', 'Category Details')
@section('heading', 'Category Details')
@section('link_text', 'Goto All Category')
@section('link', '/category')

@section('content')

<div class="row my-4">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid card-img-top">
      <div class="card-body p-5">
        <div class="d-flex justify-content-between align-items-center">
          <p class="btn btn-dark rounded-pill">{{ $product->category }}</p>

        </div>

        <hr>
        <h3 class="fw-bold text-primary">{{ $product->name }}</h3>
        <p>{{ $product->stock_count }}</p>
      </div>
      <div class="card-footer px-5 py-3 d-flex justify-content-end">
        <a href="/product/{{$product->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
        <form action="/product/{{$product->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
