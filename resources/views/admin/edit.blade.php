@extends('layouts.layout-admin')

@section('header' , 'Edit Category')

@section('content')
<div class="col-md-6">
  @if ($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="/category-edit/{{ $category->slug }}">
        @csrf
        @method('put')
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required value="{{ $category->name }}">
          </div>
          <button class="btn btn-primary" href="" type="submit">Edit Category</button>
        </div>
  </div>
@endsection