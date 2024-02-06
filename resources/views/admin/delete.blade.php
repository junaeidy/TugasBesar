@extends('layouts.layout-admin')

@section('header' , 'Delete Category')

@section('content')
    <h2> Are you sure to delete category {{ $category->name }}? </h2><br>
    <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger"> Sure </a>
    <a href="/categories" class="btn btn-info"> Cancel </a>
@endsection