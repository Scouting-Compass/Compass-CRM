@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">{{ $city->postal }} {{ $city->name }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('city-monitor.front.index') }}" class="btn btn-primary">
                    <i class="fe fe-home"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-9"> {{-- Content --}}
                <div class="card card-body">
                </div>
            </div> {{-- /// END content --}}

            <div class="col-md-9"> {{-- Sidenav --}}
            </div> {{-- /// END sidenav --}}
        </div>
    </div>
@endsection