@extends('layout.app')
@section('title', 'Home Page')
@section('heading', 'All Category')
@section('link_text', 'Add New Category')
@section('link', '/category/create')

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
    </tr>
    @foreach ($category as $key => $category)
    <tr class="pt-2">
        <td>{{ ++$key }}</td>
        <td>{{ $category->name }}</td>
        <td class="">
            <form action="/category/{{$category->id}}" method="POST">
                <a class="btn btn-info" href="/category/{{$category->id}}/edit">Edit</a>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
             {{--</form>
            <a href="/product/{{$product->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
            <form action="/product/{{$product->id}}" method="POST"> --}}
        </td>
    </tr>
    @endforeach
</table
  <div class="d-flex justify-content-center my-5">
    {{-- {{ $category->links() }} --}}
  </div>

</div>

@endsection
