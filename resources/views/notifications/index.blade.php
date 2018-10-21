@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Notifications</h1>

            <div class="page-options d-flex">
                @php ($userNotifications = auth()->user()->unreadNotifications()->count())

                <a href="{{ route('notifications.markAll') }}" class="btn @if ($userNotifications === 0) disabled @endif btn-outline-primary tw-rounded">
                    <span class="fe fe-bell-off mr-1"></span> Mark all as read
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3"> {{-- Sidebar --}}
                @include ('notifications.partials.sidebar')
            </div> {{-- /// END sidebar --}}

            <div class="col-md-9"> {{-- Content --}}
                @if (count($notifications) > 0) {{-- There are notifications found in the application --}}
                    <div class="card card-body">
                        {{ $notifications->links() }} {{-- Paginator view instance --}}
                    </div>
                    @else {{-- There are no notifications found in the application --}}
                <div class="blankslate tw-shadow">
                    <h3>No notifications</h3>
                    <p class="pt-2">
                        @if ($type === 'all')
                            Looks like that we currently have no notifications for u!
                        @else
                            Looks like you've read all your notifications.
                        @endif
                    </p>
                </div>

                @endif {{-- /// END notification loop --}}
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection