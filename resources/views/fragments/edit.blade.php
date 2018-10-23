@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Edit page fragment</h1>
            <div class="page-subtitle">{{ $page->title }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('fragments.index') }}" class="btn rounded btn-primary">
                    <i class="mr-1 fe fe-file-text"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form method="POST" action="{{ route('fragments.update', $page) }}" class="card card-body">
            @csrf               {{-- Form field protection --}}
            @method('PATCH')    {{-- HTTP method spoofing --}}
            @form($page)        {{-- Binding for the page fragment data to the form --}}

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputTitle">Fragment title <span class="tw-text-red">*</span></label>
                    <input type="text" @input('title') placeholder="Page fragment title" class="form-control col-md-7 @error('title', 'is-invalid')">
                    @error('title')
                </div>

                <div class="form-group col-md-12">
                    <label for="contentArea">Fragment content <span class="tw-text-red">*</span></label>
                    <textarea id="contentArea" @input('content') class="form-control @error('content', 'is-invalid') col-md-12" placeholder="Page fragment content">{{ $page->content }}</textarea>
                    @error('content')
                </div>
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-success rounded">Update</button>
                <button type="reset" class="btn btn-light rounded">Reset</button>
            </div>
        </form>
    </div>
@endsection