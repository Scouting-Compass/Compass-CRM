@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">User profile</h1>
            <div class="page-subtitle">{{ $user->name }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('users.index') }}" class="btn tw-rounded btn-outline-primary">
                    <i class="fe mr-1 fe-users"></i> Users overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3"> {{-- Sidenav --}}
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">
                        <i class="fe fe-user mr-1"></i> Information
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fe fe-activity mr-1"></i> Activity
                    </a>
                </div>
            </div> {{-- /// end sidenav --}}

            <div class="col-md-9"> {{-- Content --}}
                <div class="card card-body">

                </div>
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection