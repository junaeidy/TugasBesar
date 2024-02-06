@extends('layouts.layout-client')

@section('title', 'Profile')

@section('content')
    <div class="col-md-12">
        <h3>Your History Transactions</h3>
        <x-transactions-table :rentlog='$rent_logs' /> 
    </div>
@endsection

@section('js')
	
@endsection