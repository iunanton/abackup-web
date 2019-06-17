@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Timeslots</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    <table class="table table-sm">
		    @foreach ($timeslots->groupBy('date') as $key => $grouped)
			<tr><th colspan="13">{{ $key }}</th></tr>
                        <tr>
			    @foreach ($grouped->sortBy('default_timeslot_id') as $timeslot)
			        <td>{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}</td>
			    @endforeach
			</tr>
			@endforeach
			</table>
                    {{ $timeslots->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
