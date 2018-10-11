@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">Confirm that {{ $city->name }} signed the nuclear free chapter.</div>

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

                <form action="{{ route('city-monitor.store', $city) }}" enctype="multipart/form-data" method="POST" class="card card-body">
                    @csrf {{-- Form field protection --}}

                    <p class="card-text">
                        You are about to release a municipality of nuclear weapon. This can only happen
                        if there is written proof of the aldermen and or mayor of <strong>{{ $city->name }}</strong>.
                        <br/>

                        You will have to upload this statement. So that it can be placed publicly for the visitors and volunteers of this campaign.
                    </p>

                    <hr>

                    <div class="form-group row">
                        <label class="col-md-2 control-label" for="statement">Statement <span class="text-danger">*</span></label>

                        <div class="col-md-4">
                            <input type="file" class="form-control-file @error('statement', 'is-invalid')" id="statement" @input('statement')>
                            @error('statement')
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-9">
                            <button type="submit" class="btn rounded btn-sm btn-success">Submit</button>

                            <a href="{{ route('city-monitor.front.index') }}" class="btn btn-sm rounded btn-light">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection