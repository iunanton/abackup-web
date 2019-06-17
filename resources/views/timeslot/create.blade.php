@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Create Timeslot</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('timeslot.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="startDate">Start date</label>
                                <input type="date" class="form-control" id="startDate" name="start_date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endDate">End date</label>
                                <input type="date" class="form-control" id="endDate" name="end_date">
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach ($defaultTimeslots as $defaultTimeslot)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $defaultTimeslot->id }}" name="default_timeslot_id[]" value="{{ $defaultTimeslot->id }}">
                                    <label class="form-check-label" for="inlineCheckbox{{ $defaultTimeslot->id }}">{{ substr($defaultTimeslot->time, 0, 5) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
