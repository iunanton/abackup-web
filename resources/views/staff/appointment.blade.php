@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Appointments</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($appointments->isEmpty())
                        No data.
                    @else
                        <div class="table-responsive text-nowrap">
                        <table class="table table-striped table-lg">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <!--<th>Message</th>-->
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Deleted at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->timeslot->date }}</td>
                                    <td>{{ substr($appointment->timeslot->defaultTimeslot->time, 0, 5) }}</td>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->phone }}</td>
                                    <!--<td>{{ $appointment->message }}</td>-->
                                    <td>{{ $appointment->created_at }}</td>
                                    <td>{{ $appointment->updated_at }}</td>
                                    <td>{{ $appointment->deleted_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endif

                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
