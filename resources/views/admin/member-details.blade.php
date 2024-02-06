@extends('layouts.layout-admin')

@section('title', 'Member Details')
    
@section('header', 'Member Details')

@section('content')
<div id="controller">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/members" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div>
                @if (session('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                @endif
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
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Name</label>
                <input type="text" class="form-control" name="name" readonly value="{{ $user->name }}">
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" readonly value="{{ $user->username }}">
                </div>
            </div>
          </div>
        <div class="row">
            <div class="col">
                <label>Phone</label>
                <input type="number" class="form-control" name="phone" readonly value="{{ $user->phone }}">
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" readonly value="{{  $user->address }}">
                </div>
            </div>
          </div>
        <div class="row">
            <div class="col">
                <label>Status</label>
                <input type="text" class="form-control" name="status" readonly value="{{ $user->status }}">
            </div>
            <div class="col">
                
            </div>
          </div><br>
        <div class="col-md-12">
            <h3>History Transactions</h3><br>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Book Title</th>
                        <th>Rent Date</th>
                        <th>Return Date</th>
                        <th>Actual Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rent_logs as $key => $item)
                    <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->rent_date }}</td>
                        <td>{{ $item->return_date }}</td>
                        <td>{{ $item->actual_return_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });
    });
  </script>
@endsection