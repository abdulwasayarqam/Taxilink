@extends('home')

@section('content')
    <!-- Modal for Adding a New User -->
    <div class="modal fade" id="routesmodules" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Routes Modules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('association-store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="association_code" class="form-label">Association Code</label>
                                <input type="text" id="association_code" name="association_code" class="form-control" placeholder="Enter Association Code" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" id="type" name="type" class="form-control" placeholder="Enter Type" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Enter Address"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" id="province" name="province" class="form-control" placeholder="Enter Province" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="executive_committee" class="form-label">Executive Committee</label>
                                <input type="text" id="executive_committee" name="executive_committee" class="form-control" placeholder="Enter Executive Committee" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="admin_staff" class="form-label">Admin Staff</label>
                                <input type="text" id="admin_staff" name="admin_staff" class="form-control" placeholder="Enter Admin Staff" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="operation_staff" class="form-label">Operation Staff</label>
                                <input type="text" id="operation_staff" name="operation_staff" class="form-control" placeholder="Enter Operation Staff" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="routes" class="form-label">Routes</label>
                                <input type="text" id="routes" name="routes" class="form-control" placeholder="Enter Routes" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table to Display Association Data -->
    <div class="row">
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="dt-action-buttons text-end pt-6 pt-md-0">
                    <div class="dt-buttons btn-group">
                        <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#usercreate" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                            <span>
                                <i class="ti ti-plus me-sm-1"></i>
                                <span class="d-none d-sm-inline-block">Add New Record</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Association Code</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($associationData as $associations)
                        <tr>
                            <td>{{ $associations->id }}</td>
                            <td>
                                <i class="ti ti-user ti-md text-danger me-4"></i>
                                <span class="fw-medium">{{ $associations->name }}</span>
                            </td>
                            <td>{{ $associations->association_code }}</td>
                            <td>{{ $associations->created_at->format('M d, Y') }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $associations->type }}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                                           data-bs-target="#asociationedit{{ $associations->id }}"><i class="ti ti-pencil me-1"></i> Edit</a>

                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                                           data-bs-target="#asociationview{{ $associations->id }}"><i class="fa-regular fa-eye me-1"></i> View</a>

                                        <a class="dropdown-item waves-effect" href="{{ route('association-delete', ['id' => $associations->id]) }}"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal for Editing Associations -->
                        <div class="modal fade" id="asociationedit{{ $associations->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Update Associations</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('association-update', ['id' => $associations->id]) }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="nameBasic" class="form-label">Name</label>
                                                    <input type="text" name="name" value="{{ $associations->name }}" id="nameBasic" class="form-control" placeholder="Enter Name" required />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="association_code" class="form-label">Association Code</label>
                                                    <input type="text" id="association_code" name="association_code" value="{{ $associations->association_code }}" class="form-control" placeholder="Enter Association Code" required />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="type" class="form-label">Type</label>
                                                    <input type="text" id="type" name="type" value="{{ $associations->type }}" class="form-control" placeholder="Enter Type" required />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea id="address" name="address" class="form-control" placeholder="Enter Address">{{ $associations->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" id="city" name="city" value="{{ $associations->city }}" class="form-control" placeholder="Enter City" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="province" class="form-label">Province</label>
                                                    <input type="text" id="province" name="province" value="{{ $associations->province }}" class="form-control" placeholder="Enter Province" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="executive_committee" class="form-label">Executive Committee</label>
                                                    <input type="text" id="executive_committee" name="executive_committee" value="{{ $associations->executive_committee }}" class="form-control" placeholder="Enter Executive Committee" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="admin_staff" class="form-label">Admin Staff</label>
                                                    <input type="text" id="admin_staff" name="admin_staff" value="{{ $associations->admin_staff }}" class="form-control" placeholder="Enter Admin Staff" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="operation_staff" class="form-label">Operation Staff</label>
                                                    <input type="text" id="operation_staff" name="operation_staff" value="{{ $associations->operation_staff }}" class="form-control" placeholder="Enter Operation Staff" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="routes" class="form-label">Routes</label>
                                                    <input type="text" id="routes" name="routes" value="{{ $associations->routes }}" class="form-control" placeholder="Enter Routes" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Association</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Modal for View Associations -->
                        <div class="modal fade" id="asociationview{{ $associations->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">View Associations</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('association-update', ['id' => $associations->id]) }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="nameBasic" class="form-label">Name</label>
                                                    <input type="text" name="name" value="{{ $associations->name }}" id="nameBasic" class="form-control" placeholder="Enter Name" readonly/>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="association_code" class="form-label">Association Code</label>
                                                    <input type="text" id="association_code" name="association_code" value="{{ $associations->association_code }}" class="form-control" placeholder="Enter Association Code" readonly />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="type" class="form-label">Type</label>
                                                    <input type="text" id="type" name="type" value="{{ $associations->type }}" class="form-control" placeholder="Enter Type" readonly />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea id="address" name="address" class="form-control" readonly placeholder="Enter Address">{{ $associations->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" id="city" name="city" value="{{ $associations->city }}" class="form-control" placeholder="Enter City"  readonly/>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="province" class="form-label">Province</label>
                                                    <input type="text" id="province" name="province" value="{{ $associations->province }}" class="form-control" placeholder="Enter Province"  readonly/>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="executive_committee" class="form-label">Executive Committee</label>
                                                    <input type="text" id="executive_committee" name="executive_committee" value="{{ $associations->executive_committee }}" class="form-control" placeholder="Enter Executive Committee" readonly />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="admin_staff" class="form-label">Admin Staff</label>
                                                    <input type="text" id="admin_staff" name="admin_staff" value="{{ $associations->admin_staff }}" class="form-control" placeholder="Enter Admin Staff" readonly />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="operation_staff" class="form-label">Operation Staff</label>
                                                    <input type="text" id="operation_staff" name="operation_staff" value="{{ $associations->operation_staff }}" class="form-control" placeholder="Enter Operation Staff" readonly />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="routes" class="form-label">Routes</label>
                                                    <input type="text" id="routes" name="routes" value="{{ $associations->routes }}" class="form-control" placeholder="Enter Routes" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            {{--                                            <button type="submit" class="btn btn-primary">Update Association</button>--}}
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
