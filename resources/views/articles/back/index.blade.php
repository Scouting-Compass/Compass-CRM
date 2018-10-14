@extends ('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">News articles</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Published articles</a>
                        <a class="dropdown-item" href="">Drafted articles</a>
                        <a class="dropdown-item" href="">Deleted articles</a>
                    </div>
                </div>

                <form class="ml-2" action="" method="POST">
                    <input type="text" class="form-control" placeholder="Search article">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">

        </div>
    </div>
@endsection