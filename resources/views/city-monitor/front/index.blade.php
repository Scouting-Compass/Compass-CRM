@extends('layouts.frontend')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">

                </div>
            </div>

            <div class="col-md-4"> {{-- Sidebar --}}
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-success mr-3">
                            <i class="fe fe-check-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">132 <small>Cities</small></h5>
                            <small class="text-muted">Accepted the declaration</small>
                        </div>
                    </div>


                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-secondary mr-3">
                            <i class="fe fe-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">132 <small>Cities</small></h5>
                            <small class="text-muted">Didn't voted for the declaration</small>
                        </div>
                    </div>

                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-danger mr-3">
                            <i class="fe fe-x-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">132 <small>Cities</small></h5>
                            <small class="text-muted">Didn't accept the declaration</small>
                        </div>
                    </div>
                </div>
            </div> {{-- /// END sidebar --}}
        </div>
    </div>
@endsection