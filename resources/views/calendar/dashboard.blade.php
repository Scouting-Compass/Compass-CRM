@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Lease calendar</h1>

            <div class="page-options d-flex">
                <a href="{{ route('lease.create') }}" class="btn tw-rounded btn-primary mr-2">
                    <i class="fe fe-plus-circle"></i>
                </a>
                    
                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search lease">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            @include('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive">
                <table class="table table-sm @if (count($leases) > 0) table-hover @endif">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">Tenant</th>
                            <th scope="col" class="border-top-0">Contact address</th>
                            <th scope="col" class="border-top-0">Lease period</th>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leases as $lease) {{-- Loop through the leases --}}
                            <tr>
                                <td><a href="">{{ $lease->tenant->name }}</a></td>
                                <td>{{ $lease->tenant->email }}</td>
                                <td>{{ $lease->start }} - {{ $lease->end }}</td>
                            </tr>
                        @empty {{-- No leases are found --}}
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $leases->links() }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection