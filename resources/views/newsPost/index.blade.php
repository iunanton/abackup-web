@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">News</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @empty ($newsPosts)
                        No data.
                    @else
                        <div class="table-responsive text-nowrap">
                        <table class="table table-striped table-lg">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Locale</th>
                                    <th>Content</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsPosts as $newsPost)
                                <tr>
                                    <td>{{ $newsPost->id }}</td>
                                    <td>{{ $newsPost->locale }}</td>
                                    <td>{{ Str::limit($newsPost->content, 50) }}</td>
                                    <td>{{ $newsPost->created_at }}</td>
                                    <td>{{ $newsPost->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endempty

                    {{ $newsPosts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
