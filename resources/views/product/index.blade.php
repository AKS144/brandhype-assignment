@extends('layout.app')
@section('title', 'Home Page')
@section('heading', 'All Product')
@section('link_text', 'Add New Product')
@section('link', '/product/create')

@section('content')

@if(session('message'))
<div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
  <strong>{{ session('message') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row g-4 mt-1">

<table class="table table-bordered text-center">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Stock Count</th>

        <th>Image</th>
        {{-- <th>Action</th> --}}
    </tr>
    @foreach ($product as $key => $product)
    <tr class="pt-2">
        <td>{{ ++$key }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->stock_count }}</td>


        <td>    <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid img-thumbnail" width="100" height="150"><td>
        <td class="">

            <form action="/product/{{$product->id}}" method="POST">
                <a class="btn btn-primary" href="/product/{{$product->id}}/edit">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            {{-- <a href="/product/{{$product->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
            <form action="/product/{{$product->id}}" method="POST"> --}}
        </td>
    </tr>
    @endforeach
</table>
  <div class="d-flex justify-content-center my-5">

  </div>
</div>

@endsection
