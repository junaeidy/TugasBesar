@extends('layouts.layout-admin')

@section('title', 'Transactions')
    
@section('header', 'Transaction List')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div id="controller">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" @click="addData()" class="btn btn-primary">Add Transaction</a>
                            {{-- <a href="#" @click="returnBook()" class="btn btn-warning">Return Book</a> --}}
                        </div>
                        <div>
                            @if (session('message'))
                                <div class="alert {{ session('alert-class') }}">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('message') }}
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
                        <x-transactions-table :rentlog='$rent_logs' />
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form :action="actionUrl" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Transaction</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="_method" value="put" v-if="editStatus">

                        <div class="form-group">
                            <label>
                                User : 
                            </label>
                            <select class="form-control selectUser" name="user_id" id="user">
                                <option value="">Select user...</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Book : </label>
                            <select class="form-control selectUser" name="book_id" id="book">
                                <option value="">Select book...</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.selectUser').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('.selectUser1').select2();
});
</script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            data : {},
            actionUrl : '{{ url('transactions') }}',
            editStatus : false
        },
        mounted: function () {

        },
        methods: {
            addData() {
                this.data = {};
                this.actionUrl = '{{ url('transactions') }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            // editData(data) {
            //     this.data = data;
            //     this.actionUrl = '{{ url('books') }}'+'/' +data.slug;
            //     this.editStatus = true;
            //     $('#modal-default').modal();
            returnBook() {
                this.actionUrl = '{{ url('transactions') }}';
                $('#modal-returnBook').modal();
            },
            },
            // deleteData(id) {
            //     this.actionUrl = '{{ url('books') }}'+'/'+id;
            //     if(confirm("Are you sure to delete this book?")){
            //         axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
            //             location.reload();
            //         });
            //     }
            // }
            
    });
</script>
@endsection
