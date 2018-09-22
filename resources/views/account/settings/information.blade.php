@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Account settings</h1>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('account.settings.partials.sidebar')
            </div>

            <div class="col-md-9">
                <form class="card card-body" action="{{ route('user.settings.info') }}" method="POST">
                    <h6 class="border-bottom border-gray pb-1 mb-3">Account information</h6>

                    @include ('flash::message') {{-- Flash session view partial --}}

                    @csrf               {{-- Form field protection --}}
                    @method('PATCH')    {{-- HTTP method spoofing --}}
                    @form($authUser)    {{-- Bind the authenticated user data to the form. --}}

                    <div class="form-group">
                        <label for="inputName">Your name <span class="tw-text-red">*</span></label>
                        <input type="text" class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="Enter name" @input('name')>
                        @error('name')
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email address <span class="tw-text-red">*</label>
                        <input type="email" class="form-control @error('email', 'is-invalid')" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" @input('email')>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Update</button>
                        <button type="reset" class="btn btn-link rounded">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection