@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Page fragments</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <form action="" method="POST">
                    <input type="text" class="form-control" placeholder="Search fragment">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            @include ('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive mb-0">
                <table class="table table-sm @if ($pages->count() > 0) table-hover @endif">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Last editor</th>
                            <th scope="col" class="border-top-0">Title</th>
                            <th scope="col" class="border-top-0">Last edited</th>
                            <th scope="col" class="border-top-0">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)
                            <tr>
                                <td><code>#P{{ $page->id }}</code></td>
                                <td>{{ $page->lastEditor->name }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->updated_at->diffForHumans() }}</td>

                                <td> {{-- Options --}}
                                    <span class="pull-right">
                                        <a href="" class="no-underline mr-1 text-muted">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        <a href="{{ route('fragments.edit', $page) }}" class="no-underline mr-1 text-muted">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                    </span>
                                </td> {{-- /// END options --}}
                            </tr>
                        @empty {{-- There are currently no pages found in the application --}}
                            <tr>
                                <td colspan="5">
                                    <i class="text-muted">There are currently no page fragments in the application.</i>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection