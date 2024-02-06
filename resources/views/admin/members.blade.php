@extends('layouts.layout-admin')

@section('title' , 'Member List')
@section('header' , 'Member List')

@section('content')
<div id="controller">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <a href="#" @click="viewUser()" class="btn btn-primary">New Registered User</a>
                 <a href="#" @click="banedUser()" class="btn btn-secondary">View Banned User</a>
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
               <div class="card-body p-0">
                    <table id="example1" class="table table-striped table-bordered">
                         <thead>
                              <tr>
                                   <th style="width: 10px">No</th>
                                   <th class="text-center">Name</th>
                                   <th class="text-center">Username</th>
                                   <th class="text-center">Phone</th>
                                   <th class="text-center">Address</th>
                                   <th class="text-center">Status</th>
                                   <th class="text-center">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($members as $key => $member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->status }}</td>
                                    {{-- <td>{{ date('H:i:s - d/m/Y', strtotime($book->created_at)) }}</td>
                         <td>{{ date('H:i:s - d/m/Y', strtotime($book->updated_at)) }}</td> --}}
                                    <td class="text-center"> <a href="member-details/{{ $member->slug }}" class="btn btn-warning btn-sm">Detail</a> |
                                        <a class="btn btn-danger btn-sm" href="#" @click="deleteUser({{ $member->id }})" >Banned User</a>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
               </div>
         </div>
     </div>
     <div class="modal fade" id="modal-defaultDetail">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">User Detail</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form :action="actionUrl" method="POST" autocomplete="off" enctype="multipart/form-data">
                            </div>
                            <div class="modal-body">
                                @csrf
    
                                <input type="hidden" name="_method" value="put" v-if="editStatus">
                                <div class="row">
                                    <div class="col">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" readonly :value="data.name">
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" readonly :value="data.username">
                                        </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" name="phone" readonly :value="data.phone">
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" readonly :value="data.address">
                                        </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status" readonly :value="data.status">
                                    </div>
                                    <div class="col">
                                        
                                    </div>
                                  </div>
                            </div>
                        <div class="modal-header">
                            <h4 class="modal-title">Rent Logs</h4>
                        </div>
                        
                        </form>
                      </div>
              </div>
          </div>
      </div>
     {{-- Register User And Banned User --}}
     <div class="modal fade" id="modal-defaultRegister">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">New Registered User</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <table id="example2" class="table table-striped table-bordered">
                              <thead>
                                   <tr>
                                        <th style="width: 10px">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                  @foreach ($registeredUsers as $key => $item)
                                  <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="text-center"> <a href="/members-approve/{{ $item->slug }}" class="btn btn-success">Approve</a></td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
              </div>
          </div>
      </div>

      {{-- Banned User --}}
      <div class="modal fade" id="modal-defaultBaned">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Banned User</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                 <tr>
                                      <th style="width: 10px">No</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">Username</th>
                                      <th class="text-center">Phone</th>
                                      <th class="text-center">Address</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Action</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($userDeleted as $key => $item)
                                <tr>
                                      <td>{{ $key + 1 }}</td>
                                      <td>{{ $item->name }}</td>
                                      <td>{{ $item->username }}</td>
                                      <td>{{ $item->phone }}</td>
                                      <td>{{ $item->address }}</td>
                                      <td>{{ $item->status }}</td>
                                      <td class="text-center"> <a href="/members-restore/{{ $item->slug }}" class="btn btn-warning">Unbanned</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
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
   <script type="text/javascript">
       var controller = new Vue({
           el: '#controller',
           data: {
               data : {},
               actionUrl : '{{ url('members') }}',
               editStatus : false
           },
           mounted: function () {

           },
           methods: {
               viewUser() {
                   this.data = {};
                   this.actionUrl = '{{ url('members') }}';
                   this.editStatus = false;
                   $('#modal-defaultRegister').modal();
               },
               banedUser() {
                   $('#modal-defaultBaned').modal();
               },
               detailUser(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('members') }}'+'/' +data.slug;
                    this.editStatus = true;
                   $('#modal-defaultDetail').modal();
               },
               deleteUser(id) {
                this.actionUrl = '{{ url('members') }}'+'/'+id;
                   if(confirm("Are you sure to Banned this User?")){
                       axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                           location.reload();
                       });
                   }
               }
           }
       });
   </script>
@endsection