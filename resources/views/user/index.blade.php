@extends('home')
@section('content')
<!-- Modal -->
<div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add User</h5>
            <button
               type="button"
               class="btn-close"
               data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <form action="{{route('user-store')}}" method="post">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col mb-4">
                     <label for="nameBasic" class="form-label">Name</label>
                     <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                  </div>
               </div>
               <div class="row g-4">
                  <div class="col mb-0">
                     <label for="emailBasic" class="form-label">Email</label>
                     <input
                        type="email"
                        id="emailBasic"
                        class="form-control"
                        name="email"
                        placeholder="xxxx@xxx.xx" />
                  </div>
                  <div class="col mb-0">
                     <label for="role" class="form-label">Role</label>
                     <select name="role" id="role" class="form-control">
                        <option value="super_admin">Super Administrator</option>
                        <option value="admin">Administrator</option>
                        <option value="taxi_operator">Taxi Operator</option>
                        <option value="driver">Driver</option>
                        <option value="driver_assistant">Driver Assistant</option>
                        <option value="rank_marshal">Rank Marshal</option>
                        <option value="route_patrol">Route Patrol Officer</option>
                        <option value="hlokomela">Law Enforcement (Hlokomela)</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" id="password" name="password" class="form-control" placeholder="Enter 8 digit password" />
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
               Close
               </button>
               <button type="submit" class="btn btn-primary">Create User</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="row">
   <div class="card">
      <div class="card-header flex-column flex-md-row">
         <div class="dt-action-buttons text-end pt-6 pt-md-0">
            <div class="dt-buttons btn-group">
               <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                  data-bs-target="#usercreate" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button>
            </div>
         </div>
      </div>
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table">
            <thead>
               <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Role</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($users as $index => $user)
               <tr>
                  <td>{{$index+1}}</td>
                  <td>
                     <i class="ti ti-user ti-md text-danger me-4"></i>
                     <span class="fw-medium">{{$user->name}}</span>
                  </td>
                  <td>{{$user->email}}</td>
                  <td>{{ $user->created_at->format('M d, Y') }}</td>
                  <td><span class="badge bg-label-primary me-1">{{$user->role}}</span></td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                              data-bs-target="#useredit{{$user->id}}"><i class="ti ti-pencil me-1"></i> Edit</a>
                           <a class="dropdown-item waves-effect" href="{{ route('user-delete', ['id' => $user->id]) }}"><i class="ti ti-trash me-1"></i> Delete</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <!-- Update Modal -->
               <div class="modal fade" id="useredit{{$user->id}}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                           <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user-update', ['id' => $user->id]) }}" method="post">
                           @csrf
                           <div class="modal-body">
                              <div class="row">
                                 <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Enter Name" />
                                 </div>
                              </div>
                              <div class="row g-4">
                                 <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Email</label>
                                    <input
                                       type="email"

                                       class="form-control"
                                       name="email"
                                       value="{{$user->email}}"
                                       placeholder="xxxx@xxx.xx" />
                                 </div>
                                 <div class="col mb-0">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control">
                                    <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Administrator</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                                    <option value="taxi_operator" {{ $user->role == 'taxi_operator' ? 'selected' : '' }}>Taxi Operator</option>
                                    <option value="driver" {{ $user->role == 'driver' ? 'selected' : '' }}>Driver</option>
                                    <option value="driver_assistant" {{ $user->role == 'driver_assistant' ? 'selected' : '' }}>Driver Assistant</option>
                                    <option value="rank_marshal" {{ $user->role == 'rank_marshal' ? 'selected' : '' }}>Rank Marshal</option>
                                    <option value="route_patrol" {{ $user->role == 'route_patrol' ? 'selected' : '' }}>Route Patrol Officer</option>
                                    <option value="hlokomela" {{ $user->role == 'hlokomela' ? 'selected' : '' }}>Law Enforcement (Hlokomela)</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter 8 digit password" />
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                              Close
                              </button>
                              <button type="submit" class="btn btn-primary">Update User</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="public/assets/js/tables-datatables-advanced.js"></script>
@endsection







