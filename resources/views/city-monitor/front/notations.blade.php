<div class="card card mt-3 mb-0">
    <div class="card-header pl-3 pr-3 p-2">
        <code>{{ $city->postal }}</code> - {{ $city->name }}
        <strong><span class="pull-right">(Notations)</span></strong>
    </div>
    <div class="card-body">
        
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col" class="border-top-0">Author</th>
                    <th scope="col" class="border-top-0">Notation</th>

                    @if (auth()->check() && $authUser->hasRole('admin'))
                        <th scope="col" class="border-top-0">&nbsp;</th>
                    @endif
                </th>               
            </thead>
            <tbody>
                @foreach ($notations as $notation) {{-- Loop through the notations --}}
                    <tr>
                        <td>{{ $notation->author->name }}</td> 
                        <td>{{ $notation->title }}</td>

                        @if (auth()->check() && $authUser->hasRole('admin'))
                            <td>
                                <span class="float-right">
                                    <a href="" class="text-secondary no-underline mr-1">
                                        <i class="fe fe-edit"></i>
                                    </a>

                                    <a href="" class="tw-text-red no-underline">
                                        <i class="fe fe-x-circle"></i>
                                    </a>
                                </span>
                            </td>
                        @endif
                    </tr>
                @endforeach {{-- /// END notation loop --}}
            </tbody>
        </table>

        {{ $notations->links() }} {{-- Pagination view instance --}}
    </div>
</div>