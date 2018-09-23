@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <a href="{{ route('users.create') }}" class="btn tw-rounded btn-primary mr-2">
                    <i class="fe fe-user-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>
                            
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'all']) }}">All users</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'admin']) }}">Administrators</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'deactivated']) }}">Deactivated users</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'deleted']) }}">Deleted users</a>
                    </div>
                </div>
                    
                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search user">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            @include('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Name</th>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">Email</th>
                            <th scope="col" class="border-top-0">Created at</th>
                            <th scope="col" class="border-top-0">&nbsp;</th> {{-- Table header for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user) {{-- Users loop --}}
                            <tr>
                                <td><strong>#{{ $user->id }}</strong></td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->isBanned())
                                        <span class="badge badge-danger">Deactivated</span>
                                    @else {{-- User is not banned --}}
                                        @if ($user->isOnline())
                                            <span class="badge badge-success">Online</span>
                                        @else {{-- The user is offline --}}
                                            <span class="badge badge-danger">Offline</span>
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                
                                <td> {{-- User options --}}
                                    <span class="pull-right">
                                        <a href="" class="text-secondary no-underline pr-1"><i class="fe fe-info"></i></a>

                                        @if ($user->isNotBanned())
                                            <a href="{{ route('users.lock', $user) }}" class="text-secondary no-underline pr-1">
                                                <i class="fe fe-lock"></i>
                                            </a>
                                        @elseif ($user->isBanned()) {{-- User is deactivated inthe application --}}
                                            <a href="{{ route('users.unlock', $user) }}" class="text-secondary no-underline pr-1">
                                                <i class="fe fe-unlock"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('users.delete', $user) }}" class="no-underline text-danger"><i class="fe fe-user-x"></i></a>
                                    </span>
                                </td> {{-- /// END user options --}}
                            </tr>
                        @empty
                        @endforelse {{-- /// END users loop --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection