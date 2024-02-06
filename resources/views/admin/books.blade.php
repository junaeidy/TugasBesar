@extends('layouts.layout-admin')

@section('title', 'Books List')
@section('header', 'Books List')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <div id="controller">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-primary">Add Books</a>
                    <a href="#" @click="restoreData()" class="btn btn-secondary">View Deleted Data</a>
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
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center" style="width: 50px">Cover</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $book->cover }}</td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @foreach ($book->categories as $category)
                                            {{ $category->name }},
                                        @endforeach
                                    </td>
                                    <td>{{ $book->status }}</td>
                                    {{-- <td>{{ date('H:i:s - d/m/Y', strtotime($book->created_at)) }}</td>
                         <td>{{ date('H:i:s - d/m/Y', strtotime($book->updated_at)) }}</td> --}}
                                    <td class="text-center"> <a href="#" @click="editData({{ $book }})" class="btn btn-warning btn-sm">Edit</a> |
                                        <a class="btn btn-danger btn-sm" href="#" @click="deleteData({{ $book->id }})" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Books</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="put" v-if="editStatus">
                            {{-- <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image">
                    </div> --}}
                            <div class="form-group">
                                <label>Book Code</label>
                                <input type="text" class="form-control" name="book_code" required :value="data.book_code">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required :value="data.title">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            {{-- <div class="form-group">
                                <label>Current Image</label>
                                @if ($book->cover != '')
                                    <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="100px">
                                    @else
                                    <img src="{{ asset('images/not-found.jpg') }}" alt="" width="100px">
                                    
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <label>
                                    Category
                                </label>
                                <select class="form-control select-multiple" id="category" name="categories[]" multiple>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Current Category</label>
                                <ul>
                                    @foreach ($book->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div> --}}
                            
                            
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Books Delete</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookDeleted as $key => $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $item->book_code }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td class="text-center"> <a href="/books-restore/{{ $item->slug }}" class="btn btn-warning btn-sm">Restore</a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- @foreach($bookDeleted as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->book_code }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td class="text-center"> <a href="/books-restore/{{ $item->slug }}" class="btn btn-warning btn-sm">Restore</a> 
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script>
    $(function () {
      $("#example2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
<script>
    $(document).ready(function(){
        $('.select-multiple').select2();
    });
</script>
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data : {},
                actionUrl : '{{ url('books') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('books') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('books') }}'+'/' +data.slug;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                restoreData() {
                    this.actionUrl = '{{ url('books') }}';
                    $('#modal-default2').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('books') }}'+'/'+id;
                    if(confirm("Are you sure to delete this book?")){
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        });
                    }
                }
                
            }
        });
    </script>
   
@endsection
