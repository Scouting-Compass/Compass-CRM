@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Create Notation</h1>
            <div class="page-subtitle"> {{ $city->postal }}, {{ $city->name }}</div>
        </div>
    </div>

    <div class="container py-3">
        <form action="{{ route('notation.store', $city) }}" method="POST" class="card card-body">
            @csrf {{-- Form field protection --}}

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputTitle">Notation title <span class="tw-text-red">*</span></label>
                    <input type="text" @input('title') placeholder="Notation title" class="form-control col-md-7 @error('title', 'is-invalid')">
                    @error('title')
                </div>

                <div class="form-group col-md-12">
                    <label for="contentArea">Extra notes (internal)</label>
                    <textarea id="contentArea" @input('content') class="form-control @error('content', 'is-invalid') col-md-12" placeholder="Extra notes for the notation"></textarea>
                    @error('content')
                </div>
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-success rounded">Save</button>
                <button type="reset" class="btn btn-light rounded">Reset</button>
            </div>
        </form>
    </div>
@endsection