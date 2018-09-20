@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Account settings</h1>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('account.settings.partials.sidebar')
            </div>
        </div>
    </div>
@endsection