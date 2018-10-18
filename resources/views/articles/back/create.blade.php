@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">News articles</h1>
            <div class="page-subtitle">Share some news with the followers</div>

            <div class="page-options d-flex">
                <a href="{{ route('articles.back.index') }}" class="btn btn-outline-primary tw-rounded">
                    <i class="fe fe-file-text mr-1"></i> Article overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form method="POST" action="{{ route('articles.store') }}" class="card card-body">
            @csrf {{-- Form field protection --}}

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputTitle">Title <span class="text-danger">*</span></label>
                    <input type="text"@input('title') placeholder="Article title" class="form-control col-md-7 @error('title', 'is-invalid')">
                    @error('title')
                </div>

                <div class="form-group col-md-12">
                    <label for="contentArea">Article content <span class="tw-text-red">*</span></label>
                    <textarea id="contentArea" @input('content') class="form-control @error('content', 'is-invalid') col-md-12" placeholder="Describe where u need support."></textarea>
                    @error('content')
                </div>
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-success rounded">Submit</button>
                <button type="reset" class="btn btn-light rounded">Reset</button>
            </div>
        </form>
    </div>
@endsection