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
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header pl-3 pr-3 p-2">
                                    <code>{{ $city->postal }}</code> - {{ $city->name }}
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

                            @if ($city->notations->count() > 0) {{-- City has notations --}}
                                {{-- Notation listing view partial --}}
                                @include ('city-monitor.front.notations', ['notations' => $city->notations()->simplePaginate()])
                            @else {{-- City has no notations --}}
                                <div class="alert alert-info alert-important mt-3 mb-0">
                                    <strong><i class="fe fe-info"></i> Info:</strong>
                                    There are no notations for {{ $city->name }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <a class="btn btn-block btn-social btn-twitter text-white">
                                <span class="fe fe-twitter"></span> Share on Twitter
                            </a>

                            <a class="btn btn-block btn-social btn-facebook text-white">
                                <span class="fe fe-facebook"></span> Share on Facebook
                            </a>

                            @if (auth()->check() && $authUser->hasRole('admin'))
                                <hr class="mt-2 mb-2">

                                <a href="{{ route('notation.create', $city) }}" class="btn btn-outline-secondary rounded btn-sm btn-lg btn-block">
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