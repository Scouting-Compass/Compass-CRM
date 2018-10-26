@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">{{ $city->postal }} {{ $city->name }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('city-monitor.back.index') }}" class="btn btn-primary">
                    <i class="fe fe-home"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header pl-3 pr-3 p-2">
                                    <code>1000</code> - Brussel
                                    <strong><span class="pull-right">(Information)</span></strong>
                                </div>

                                <div class="card-body p-3">
                                    <table class="table table-borderless table-sm mb-0">
                                        <tbody>
                                            <tr>
                                                <th>City name:</th> <td>{{ $city->name }}</td>
                                                <th>Province: </th> <td>{{ $city->province->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Postal code:</th> <td>{{ $city->postal }} </td>
                                                <th>Charter:</th>     <td><span class="badge badge-success">Accepted</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="alert alert-info alert-important mt-3 mb-0">
                                <strong><i class="fe fe-info"></i> Info:</strong>
                                There are no notations for {{ $city->name }}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <a class="btn btn-block btn-social btn-twitter text-white">
                                <span class="fe fe-twitter"></span> Share on Twitter
                            </a>

                            <a class="btn btn-block btn-social btn-facebook text-white">
                                <span class="fe fe-facebook"></span> Share on Facebook
                            </a>

                            @if (auth()->user()->hasRole('admin'))
                                <hr class="mt-2 mb-2">

                                <a href="{{ route('notation.create') }}" class="btn btn-outline-secondary rounded btn-sm btn-lg btn-block">
                                    <i class="fe fe-plus-circle mr-1"></i> Add notation
                                </a>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection