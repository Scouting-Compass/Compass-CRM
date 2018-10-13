@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('city-monitor.back.index', ['filter' => 'accepted']) }}">Accepted cities</a>
                        <a class="dropdown-item" href="{{ route('city-monitor.back.index', ['filter' => 'pending'])  }}">Pending cities</a>
                        <a class="dropdown-item" href="{{ route('city-monitor.back.index', ['filter' => 'rejected']) }}">Rejected cities</a>
                    </div>
                </div>

                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search city">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">Postal</th>
                            <th scope="col" class="border-top-0">Name</th>
                            <th scope="col" class="border-top-0">Province</th>
                            <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column dedicated to functions --}}
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($cities as $city) {{-- Loop through the cities. --}}
                                <tr>
                                    <td>
                                        <span class="badge badge-{{ $city->status }}">
                                            <i class="fe fe-{{ $city->status }} mr-1"></i> {{ ucfirst($city->status) }}
                                        </span>
                                    </td>

                                    <td><strong>{{ $city->postal}}</strong>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->province->name }}</td>
                                    <td>{{--Table functions --}}
                                        <span class="pull-right">
                                            <a class="text-secondary no-underline" href="{{ route('city-monitor.front.show', $city) }}">
                                                <i class="fe fe-eye mr-1"></i>
                                            </a>

                                            <a class="text-secondary no-underline" href="">
                                                <i class="fe fe-edit mr-1"></i>
                                            </a>


                                            @if ($city->charter_code === 'R')
                                                <a class="text-secondary no-underline" href="">
                                                   <i class="fe fe-circle mr-1"></i>
                                                </a>

                                                <a class="text-success no-underline mr-1" href="{{ route('city-monitor.accept', $city) }}">
                                                    <i class="fe fe-check-circle"></i>
                                                </a>
                                            @endif

                                            @if ($city->charter_code === 'P')
                                                <a class="text-success no-underline mr-1" href="{{ route('city-monitor.accept', $city) }}">
                                                    <i class="fe fe-check-circle"></i>
                                                </a>

                                                <a class="text-danger no-underline" href="{{ route('city-monitor.delete', $city) }}">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            @endif


                                            @if ($city->charter_code === 'A')
                                                <a class="text-secondary no-underline" href="">
                                                   <i class="fe fe-circle mr-1"></i>
                                                </a>

                                                <a class="text-danger no-underline" href="{{ route('city-monitor.delete', $city) }}">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            @endif
                                        </span>
                                    </td> {{-- /// END table functions --}}
                                </tr>
                            @empty {{-- No cities are found in the table.  --}}
                                {{-- TODO: Implement empty filter text --}}
                            @endforelse {{-- /// END city loop --}}
                        </tbody>
                    </table>

                    {{ $cities->links() }} {{-- Pagination view instance --}}
                </div>
            </div>

            <div class="col-md-4"> {{-- Sidebar --}}
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-success mr-3">
                            <i class="fe fe-check-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">{{ $accepted }} <small>Cities</small></h5>
                            <small class="text-muted">Accepted the declaration</small>
                        </div>
                    </div>


                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-secondary mr-3">
                            <i class="fe fe-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">{{ $pending }} <small>Cities</small></h5>
                            <small class="text-muted">Didn't voted for the declaration</small>
                        </div>
                    </div>

                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md tw-shadow bg-danger mr-3">
                            <i class="fe fe-x-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">{{ $rejected }} <small>Cities</small></h5>
                            <small class="text-muted">Didn't accept the declaration</small>
                        </div>
                    </div>
                </div>
            </div> {{-- /// END sidebar --}}
        </div>
    </div>
@endsection