@extends('layouts.layout-admin')

@section('header' , 'Category')

@section('content')

<div class="col-md-6">
    <!-- general form elements -->
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
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add New Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ url('categories') }}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <button class="btn btn-primary" href="" type="submit">Add Category</button>
        </div>
  </div>
@endsection