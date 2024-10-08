@extends('home')

@section('content')
    <!-- Modal for Adding a New Vehicle -->
    <div class="modal fade" id="vehiclescreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicles-store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Vehicle Fields -->
                        <div class="row mb-3">
                            <div class="col mb-0">
                                <label for="user" class="form-label">Select Association</label>
                                <select class="form-control" name="association_id" id="association_id" required>
                                    @foreach($associations as $association)
                                        <option value="{{ $association->id }}">{{ $association->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="owner_name" class="form-label">Owner Name</label>
                                <input type="text" name="owner_name" id="owner_name" class="form-control" placeholder="Enter Owner Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="make" class="form-label">Make</label>
                                <input type="text" id="make" name="make" class="form-control" placeholder="Enter Make" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" id="model" name="model" class="form-control" placeholder="Enter Model" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" id="color" name="color" class="form-control" placeholder="Enter Color" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="number_plate" class="form-label">Number Plate</label>
                                <input type="text" id="number_plate" name="number_plate" class="form-control" placeholder="Enter Number Plate" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="vin_number" class="form-label">Vin Number</label>
                                <input type="text" id="vin_number" name="vin_number" class="form-control" placeholder="Enter Vin Number" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="engine_number" class="form-label">Engine Number</label>
                                <input type="text" id="engine_number" name="engine_number" class="form-control" placeholder="Enter Engine Number" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="license_disc_expiry" class="form-label">License Disc Expiry</label>
                                <input type="date" id="license_disc_expiry" name="license_disc_expiry" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="operator_license_expiry" class="form-label">Operator License Expiry</label>
                                <input type="date" id="operator_license_expiry" name="operator_license_expiry" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="linked_associations" class="form-label">Linked Associations</label>
                                <input type="text" id="linked_associations" name="linked_associations" class="form-control" placeholder="Enter Linked Associations" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table to Display Vehicles Data -->
    <div class="row">
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="dt-action-buttons text-end pt-6 pt-md-0">
                    <div class="dt-buttons btn-group">
                        <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#vehiclescreate" type="button">
                            <span>
                                <i class="ti ti-plus me-sm-1"></i>
                                <span class="d-none d-sm-inline-block">Add New Vehicle</span>
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
                        <th>Owner Name</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Number Plate</th>
                        <th>Vin Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->owner_name }}</td>
                            <td>{{ $vehicle->make }}</td>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle->number_plate }}</td>
                            <td>{{ $vehicle->vin_number }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#vehicleedit{{ $vehicle->id }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#vehicleview{{ $vehicle->id }}"><i class="fa-regular fa-eye me-1"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('vehicles-delete', ['id' => $vehicle->id]) }}"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal for Editing Vehicle -->
                        <div class="modal fade" id="vehicleedit{{ $vehicle->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Update Vehicle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('vehicles-update', ['id' => $vehicle->id]) }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <!-- Similar Fields for Update -->
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="owner_name" class="form-label">Owner Name</label>
                                                    <input type="text" name="owner_name" value="{{ $vehicle->owner_name }}" id="owner_name" class="form-control" placeholder="Enter Owner Name" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="make" class="form-label">Make</label>
                                                    <input type="text" id="make" name="make" value="{{ $vehicle->make }}" class="form-control" placeholder="Enter Make" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="model" class="form-label">Model</label>
                                                    <input type="text" id="model" name="model" value="{{ $vehicle->model }}" class="form-control" placeholder="Enter Model" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="number_plate" class="form-label">Number Plate</label>
                                                    <input type="text" id="number_plate" name="number_plate" value="{{ $vehicle->number_plate }}" class="form-control" placeholder="Enter Number Plate" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="vin_number" class="form-label">Vin Number</label>
                                                    <input type="text" id="vin_number" name="vin_number" value="{{ $vehicle->vin_number }}" class="form-control" placeholder="Enter Vin Number" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="engine_number" class="form-label">Engine Number</label>
                                                    <input type="text" id="engine_number" name="engine_number" value="{{ $vehicle->engine_number }}" class="form-control" placeholder="Enter Engine Number" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="license_disc_expiry" class="form-label">License Disc Expiry</label>
                                                    <input type="date" id="license_disc_expiry" name="license_disc_expiry" value="{{ $vehicle->license_disc_expiry }}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="operator_license_expiry" class="form-label">Operator License Expiry</label>
                                                    <input type="date" id="operator_license_expiry" name="operator_license_expiry" value="{{ $vehicle->operator_license_expiry }}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="linked_associations" class="form-label">Linked Associations</label>
                                                    <input type="text" id="linked_associations" name="linked_associations" value="{{ $vehicle->linked_associations }}" class="form-control" placeholder="Enter Linked Associations" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Vehicle</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Viewing Vehicle -->
                        <div class="modal fade" id="vehicleview{{ $vehicle->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">View Vehicle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Displaying vehicle details as readonly input fields -->
                                        <div class="mb-3">
                                            <label for="owner_name" class="form-label"><strong>Owner Name</strong></label>
                                            <input type="text" id="owner_name" class="form-control" value="{{ $vehicle->owner_name }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="make" class="form-label"><strong>Make</strong></label>
                                            <input type="text" id="make" class="form-control" value="{{ $vehicle->make }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="model" class="form-label"><strong>Model</strong></label>
                                            <input type="text" id="model" class="form-control" value="{{ $vehicle->model }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="color" class="form-label"><strong>Color</strong></label>
                                            <input type="text" id="color" class="form-control" value="{{ $vehicle->color }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="number_plate" class="form-label"><strong>Number Plate</strong></label>
                                            <input type="text" id="number_plate" class="form-control" value="{{ $vehicle->number_plate }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="vin_number" class="form-label"><strong>Vin Number</strong></label>
                                            <input type="text" id="vin_number" class="form-control" value="{{ $vehicle->vin_number }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="engine_number" class="form-label"><strong>Engine Number</strong></label>
                                            <input type="text" id="engine_number" class="form-control" value="{{ $vehicle->engine_number }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="license_disc_expiry" class="form-label"><strong>License Disc Expiry</strong></label>
                                            <input type="date" id="license_disc_expiry" class="form-control" value="{{ $vehicle->license_disc_expiry }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="operator_license_expiry" class="form-label"><strong>Operator License Expiry</strong></label>
                                            <input type="date" id="operator_license_expiry" class="form-control" value="{{ $vehicle->operator_license_expiry }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="linked_associations" class="form-label"><strong>Linked Associations</strong></label>
                                            <input type="text" id="linked_associations" class="form-control" value="{{ $vehicle->linked_associations }}" readonly>
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
