@extends('layouts.layout-admin')

@section('header' , 'Deleted Category')

@section('content')
<div class="col-md-8">
     <div class="card">
      <div class="card-header">
        <a href="{{ url('categories') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
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
       <div class="card-body">
         <table class="table table-bordered">
           <thead>
             <tr>
               <th style="width: 10px">#</th>
               <th style="width:100px">Name</th>
               <th style="width:100px">Total</th>
               <th style="width: 150px">Deleted At</th>
               <th style="width: 100px">Action</th>
          </tr>
           </thead>
           <tbody>
               @foreach ($deletedCategories as $key => $category)
               <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>//</td>
                    <td>{{ date('H:i:s - d/m/Y', strtotime($category->deleted_at)) }}</td>
                    <td> <a href="category-restore/{{ $category->slug }}" class="btn btn-warning btn-sm">Restore</a>
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