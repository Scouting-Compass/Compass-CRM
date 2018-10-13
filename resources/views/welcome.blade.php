@extends('layouts.frontend', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Nuclear monitor</h1>
            <p class="lead">With this platform we want to compete for a nuclear weapon free belgium.</p>

            <hr class="my-3">

            <p class="lead">
                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-align-justify mr-1"></i> Monitor
                </a>

                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-heart text-danger mr-1"></i> Support us
                </a>
            </p>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8"> {{-- Content --}}
                <div class="card mb-3">
                    <div class="card-body mb-3">
                        <h5 class="card-title mb-1 brand-title">Title</h5>
                        <small class="card-subtitle mb-2 text-muted">Petitie gericht aan: YYYY</small>

                        <p class="card-text pt-1">
                            Lorem Ipsum
                        </p>

                        <hr class="mb-2 mt-2">
                        <a href="" class="card-link">Lees meer »</a>

                        <span class="text-muted pull-right card-link">

                               <i class="fe fe-eye"></i> 0
                            </span>
                    </div>
                </div>
            </div> {{-- /// END content --}}

            <div class="col-md-4"> {{-- Sidenav --}}
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-success mr-3">
                            <i class="fe fe-check-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">0 <small>Cities</small></h5>
                            <small class="text-muted">Accepted the declaration</small>
                        </div>
                    </div>
                </div>
            </div> {{-- /// Sidenav --}}
        </div>
    </div>
@endsection