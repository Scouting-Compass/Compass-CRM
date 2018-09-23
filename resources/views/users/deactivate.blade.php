@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Deactivate user</h1>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            <p>
                By deactivating the login for <strong>{{ $user->name }}</strong> you restrict the 
                login for {{ config('app.name')  }}, This mean the person can't login for the given period of time. <br> 
                So make sure u want to do this.
            </p>

            <hr>

            <form action="{{ route('users.lock.create', $user) }}" method="POST">
                @csrf {{-- Form field protection --}}

                <div class="form-row">
                    <div style="margin-bottom: .5rem;" class="form-group col-md-5">
                        <input type="password" @input('confirmation') class="form-control @error('confirmation', 'is-invalid')" id="inputEmail4" placeholder="Your password">
                        @error('confirmation')
                    </div>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="rounded btn btn-danger">Deactivate account</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection