@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Add lease</h1>

            <div class="page-options d-flex">
                <a href="{{ route('calendar.index') }}" class="btn btn-outline-primary">
                    <i class="mr-1 fe fe-home"></i> Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form action="{{ route('lease.store') }}" method="POST" class="card card-body">
            @csrf {{-- Form field protection --}}

            <div class="form-row">
                <div class="form-group col-md-4">
                    <h5 class="mb-2">Tenant information</h5>
                    
                    <small class="text-muted">
                        If there is found a tenant with the same email address the lease with be linked on that tenant
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputFirstname">Firstname <span class="tw-text-red">*</span></label>
                    <input type="text" class="form-control @error('firstname', 'is-invalid')" @input('firstname') id="inputFirstname">
                    @error('firstname')
                </div>

                <div class="form-group col-md-4">
                    <label for="inputLastname">Lastname <span class="tw-text-red">*</span></label>
                    <input type="text" class="form-control @error('lastname', 'is-invalid')" @input('lastname') id="inputLastname">
                    @error('lastname')
                </div>

                <div class="form-group offset-4 col-md-4">
                    <label for="inputEmail">Email address <span class="tw-text-red">*</span></label>
                    <input type="email" class="form-control @error('email', 'is-invalid')" id="inputEmail" @input('email')>
                    @error('email')
                </div>

                <div class="form-group col-md-4">
                    <label for="inputPhoneNumber">Phone number</label>
                    <input type="text" class="form-control" @input('phone_number') id="inputPhoneNumber">
                </div>
              </div>

            <hr class="mt-0">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <h5>Lease information</h5>
                </div>

                <div class="col-md-4">
                    <label>Time arrival <span class="tw-text-red">*</span></label>

                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" placeholder="format: d/m/Y">
                        </div>
                
                        <div class="form-group col-md-3">
                            <input type="text" placeholder="HH:mm" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label>Time departure <span class="tw-text-red">*</span></label>
    
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" placeholder="format: d/m/Y">
                        </div>
                    
                        <div class="form-group col-md-3">
                            <input type="text" placeholder="HH:mm" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button type="submit" class="btn rounded btn-success">
                    <i class="fe fe-plus-circle mr-1"></i> Save
                </button>

                <button type="reset" class="btn rounded btn-light">Reset</button>
            </div>
        </form>
    </div>
@endsection
