@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">{{ $city->name }} would not sign or reject the nuclear free chapter.</div>

            <div class="page-options d-flex">
                <a href="{{ route('city-monitor.front.index') }}" class="btn btn-primary">
                    <i class="fe fe-home"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('city-monitor.delete', $city) }}" method="POST" class="card card-body">
                    @csrf               {{-- Form field protection --}}
                    @method('DELETE')   {{-- HTTP method spoofing --}}

                    <p class="text-danger">
                        By registering the city (<strong>{{ $city->name }}</strong>) as rejected the copy of the charter in the application if there is one found.
                        will be deleted.
                    </p>

                    <p>
                        If you are certain of this choice, you can confirm the handling by filling in the confirmation from below.
                        To update the charter status.
                    </p>

                    <h5 class="pt-3">Request confirmation</h5>

                    <div class="form-row pt-3">
                        <div class="form-group col-md-4">
                            <input type="text" @input('confirmation') class="form-control @error('confirmation', 'is-invalid')" placeholder="Your password">
                            @error('confirmation')
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-sm rounded btn-danger">Confirm</button>

                            <a href="{{ route('city-monitor.back.index') }}" class="btn btn-sm rounded btn-light">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection