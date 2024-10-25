@extends('home')

@section('content')
    <!-- Modal for Adding a New Rank Module -->
    <div class="modal fade" id="rankmodules" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Rank Modules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>

    <!-- Table to Display Rank Modules -->
    <div class="row">
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="dt-action-buttons text-end pt-6 pt-md-0">
                    <div class="dt-buttons btn-group">
                        <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#rankmodules" tabindex="0" aria-controls="DataTables_Table_0" type="button">
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
                        <th>Rank Name</th>
                        <th>Location Link</th>
                        <th>Date</th>
                        <th>Rank Vehicle Capacity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rankModules as $rankModule)
                        <tr>
                            <td>{{ $rankModule->id }}</td>
                            <td>
                                {{--                                <i class="ti ti-user ti-md text-danger me-4"></i>--}}
                                <span class="fw-medium">{{ $rankModule->rank_name }}</span>
                            </td>
                            <td>{{ $rankModule->location_link }}</td>
                            <td>{{ $rankModule->created_at->format('M d, Y') }}</td>
                            <td>{{ $rankModule->rank_vehicle_capacity }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                                           data-bs-target="#rankmoduleedit{{ $rankModule->id }}"><i class="ti ti-pencil me-1"></i> Edit</a>

                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                                           data-bs-target="#rankmodulesview{{ $rankModule->id }}"><i class="fa-regular fa-eye me-1"></i> View</a>

                                        <a class="dropdown-item waves-effect" href="{{ route('rank-modules-delete', ['id' => $rankModule->id]) }}"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal for Editing Rank Modules -->
                        <div class="modal fade" id="rankmoduleedit{{ $rankModule->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Update Rank Modules</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('rank-modules-update', ['id' => $rankModule->id]) }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col mb-0">
                                                    <label for="association_id" class="form-label">Select Rank Marshal</label>
                                                    <select class="form-control" name="rank_marshal_id" id="rank_marshal_id" required>
                                                        <option value="1">1</option>
                                                        {{--                                @foreach($routeModules as $routeModule)--}}
                                                        {{--                                        <option value="{{ $routeModule->id }}">{{ $routeModule->id }}</option>--}}
                                                        {{--                                    @endforeach--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="rank_name" class="form-label">Rank Name</label>
                                                <input type="text" name="rank_name" value="{{ $rankModule->rank_name }}" id="rank_name" class="form-control" placeholder="Enter Rank Name" required />
                                                @error('rank_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="location_address" class="form-label">Location Address</label>
                                                <input type="text" id="location_address" value="{{ $rankModule->location_address }}" name="location_address" class="form-control" placeholder="Enter Location Address" required />
                                                @error('location_address')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="location_link" class="form-label">Location Link</label>
                                                <input type="url" id="location_link" value="{{ $rankModule->location_link }}" name="location_link" class="form-control" placeholder="Enter Location Link" required />
                                                @error('location_link')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="rank_vehicle_capacity" class="form-label">Rank Vehicle Capacity</label>
                                                <input type="number" id="rank_vehicle_capacity" value="{{ $rankModule->rank_vehicle_capacity }}" name="rank_vehicle_capacity" class="form-control" placeholder="Enter Rank Vehicle Capacity" required />
                                            </div>
                                            <div class="mb-4">
                                                <label for="rank_passenger_capacity" class="form-label">Rank Passenger Capacity</label>
                                                <input type="number" id="rank_passenger_capacity" value="{{ $rankModule->rank_passenger_capacity }}" name="rank_passenger_capacity" class="form-control" placeholder="Enter Rank Passenger Capacity" required />
                                            </div>
                                            <div class="mb-4">
                                                <label for="routes" class="form-label">Routes</label>
                                                <input type="text" id="routes" name="routes" value="{{ $rankModule->routes }}" class="form-control" placeholder="Enter Routes" required />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Rank Module</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Viewing Rank Modules -->
                        <div class="modal fade" id="rankmodulesview{{ $rankModule->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Rank Modules Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="col mb-0">
                                                <label for="association_id" class="form-label">Routes</label>
                                                <select class="form-control" name="association_id" id="association_id" disabled>
                                                    {{-- Example for associations --}}
                                                    {{-- @foreach($associations as $association)
                                                        <option value="{{ $association->id }}" {{ $rankModule->association_id == $association->id ? 'selected' : '' }}>
                                                            {{ $association->name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="rank_name" class="form-label">Rank Name</label>
                                            <input type="text" name="rank_name" value="{{ $rankModule->rank_name }}" id="rank_name" class="form-control" readonly />
                                        </div>
                                        <div class="mb-4">
                                            <label for="location_address" class="form-label">Location Address</label>
                                            <input type="text" id="location_address" value="{{ $rankModule->location_address }}" name="location_address" class="form-control" readonly />
                                        </div>
                                        <div class="mb-4">
                                            <label for="location_link" class="form-label">Location Link</label>
                                            <input type="url" id="location_link" value="{{ $rankModule->location_link }}" name="location_link" class="form-control" readonly />
                                        </div>
                                        <div class="mb-4">
                                            <label for="rank_vehicle_capacity" class="form-label">Rank Vehicle Capacity</label>
                                            <input type="number" id="rank_vehicle_capacity" value="{{ $rankModule->rank_vehicle_capacity }}" name="rank_vehicle_capacity" class="form-control" readonly />
                                        </div>
                                        <div class="mb-4">
                                            <label for="rank_passenger_capacity" class="form-label">Rank Passenger Capacity</label>
                                            <input type="number" id="rank_passenger_capacity" value="{{ $rankModule->rank_passenger_capacity }}" name="rank_passenger_capacity" class="form-control" readonly />
                                        </div>
                                        <div class="mb-4">
                                            <label for="routes" class="form-label">Routes</label>
                                            <input type="text" id="routes" value="{{ $rankModule->routes }}" name="routes" class="form-control" readonly />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
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
