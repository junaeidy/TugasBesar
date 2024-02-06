@extends('layouts.layout-admin')

@section('header' , 'Category')

@section('content')
<div class="col-md-12">
     <div class="card">
       <div class="card-header">
          <a href="{{ url('categories/create') }}" class="btn btn-primary">Add Category</a>
          <a href="{{ url('category-deleted') }}" class="btn btn-secondary">View Deleted Data</a>
       </div>
       <div>
          @if (session('status'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ session('status') }}
              </div>
              
          @endif
       </div>
       <!-- /.card-header -->
       <div class="card-body p-0">
         <table id="example1" class="table table-striped table-bordered">
           <thead>
             <tr>
               <th style="width: 10px">No</th>
               <th class="text-center">Name</th>
               <th class="text-center">Total</th>
               <th class="text-center">Created At</th>
               <th class="text-center">Update At</th>
               <th class="text-center">Action</th>
          </tr>
           </thead>
           <tbody>
               @foreach ($categories as $key => $category)
               <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>//</td>
                    <td>{{ date('H:i:s - d/m/Y', strtotime($category->created_at)) }}</td>
                    <td>{{ date('H:i:s - d/m/Y', strtotime($category->updated_at)) }}</td>
                    <td class="text-right"> <a href="category-edit/{{ $category->slug }}" class="btn btn-warning btn-sm">Edit</a> |
                    <a href="category-delete/{{ $category->slug }}" class="btn btn-danger btn-sm">Delete</a></td>
               </tr>
                   
               @endforeach
             
           </tbody>
         </table>
       </div>
       <!-- /.card-body -->
       
     </div>
     <!-- /.card -->
   </div>
@endsection
@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection