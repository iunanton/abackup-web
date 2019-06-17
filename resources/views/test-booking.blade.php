@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">{{ __('Test Booking') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            <h4 class="mb-0">{{ session('status') }}</h4>
                        </div>
                    @endif

                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#current" role="tab" aria-controls="current" aria-selected="true" onClick="document.getElementById('monthTitle').innerHTML='{{ $currentMonthTitle }}'">
                                <i class="material-icons d-block">arrow_back</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#next" role="tab" aria-controls="next" aria-selected="false" onClick="document.getElementById('monthTitle').innerHTML='{{ $nextMonthTitle }}'">
                                <i class="material-icons d-block">arrow_forward</i>
                            </a>
                        </li>
                        <li class="nav-item mr-auto">
                            <h4 id="monthTitle" class="nav-link mb-0">{{ $currentMonthTitle }}</h4>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="current" role="tabpanel" aria-labelledby="current-tab">
                            <div class="ec-calendar">
                                <div class="ec-calendar-holder">
                                    <div class="ec-weekheader">
                                        <div class="ec-weekheader-day">{{ __('SUN') }}</div>
                                        <div class="ec-weekheader-day">{{ __('MON') }}</div>
                                        <div class="ec-weekheader-day">{{ __('TUE') }}</div>
                                        <div class="ec-weekheader-day">{{ __('WED') }}</div>
                                        <div class="ec-weekheader-day">{{ __('THU') }}</div>
                                        <div class="ec-weekheader-day">{{ __('FRI') }}</div>
                                        <div class="ec-weekheader-day">{{ __('SAT') }}</div>
                                    </div>
                                    @foreach ($currentMonthGrid as $week)
                                        <div class="ec-week">
                                            @foreach ($week as $day)
                                                <div class="ec-day {{ $day['isCurMonth'] ? '' : 'ec-out-calendar' }}">
                                                    <div class="ec-dom {{ $day['isToday'] ? 'ec-today' : '' }}">{{ $day['monthDay'] }}</div>
                                                    @if ($day['isCurMonth'])
                                                        @if (!$day['isToday'] || $allowTodayBooking)

                                                            @forelse ($timeslots->filter(function($item) use ($day) { return $item->date === $day['date']->toDateString(); }) as $timeslot)
                                                                <div class="ec-calendar-event" @click.stop="onClick('{{ $timeslot->id }}', '{{ $timeslot->date }}', '{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}')">{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}</div>
                                                            @empty
                                                                <div class="ec-calendar-notice text-center">{{ __('Not available') }}</div>
                                                            @endforelse
                                                        @else
                                                            <div class="ec-calendar-notice text-center">{{ __("Please call 3116 7204 for today's booking") }}</div>
                                                        @endif
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="next" role="tabpanel" aria-labelledby="next-tab">
                            <div class="ec-calendar">
                                <div class="ec-calendar-holder">
                                    <div class="ec-weekheader">
                                        <div class="ec-weekheader-day">{{ __('SUN') }}</div>
                                        <div class="ec-weekheader-day">{{ __('MON') }}</div>
                                        <div class="ec-weekheader-day">{{ __('TUE') }}</div>
                                        <div class="ec-weekheader-day">{{ __('WED') }}</div>
                                        <div class="ec-weekheader-day">{{ __('THU') }}</div>
                                        <div class="ec-weekheader-day">{{ __('FRI') }}</div>
                                        <div class="ec-weekheader-day">{{ __('SAT') }}</div>
                                    </div>
                                    @foreach ($nextMonthGrid as $week)
                                        <div class="ec-week">
                                            @foreach ($week as $day)
                                                <div class="ec-day {{ $day['isCurMonth'] ? '' : 'ec-out-calendar' }}">
                                                    <div class="ec-dom {{ $day['isToday'] ? 'ec-today' : '' }}">{{ $day['monthDay'] }}</div>
                                                    @if ($day['isCurMonth'])
                                                        @forelse ($timeslots->filter(function($item) use ($day) { return $item->date === $day['date']->toDateString(); }) as $timeslot)
                                                            <div class="ec-calendar-event" @click.stop="onClick('{{ $timeslot->id }}', '{{ $timeslot->date }}', '{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}')">{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}</div>
                                                        @empty
                                                            <div class="ec-calendar-notice text-center">{{ __('Not available') }}</div>
                                                        @endforelse
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="appointment-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                          <form method="POST" action="{{ route('appointment.store', app()->getLocale()) }}">
                            @csrf
                            <input type="hidden" name="timeslot_id" :value="timeslot.id">

                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ __('Please confirm your HIV Test booking') }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <div class="modal-body">
                            <h4 class="text-center text-danger">{{ __('Gay Only') }}</h4>
                            <div class="form-group">
                              <label for="input-date">{{ __('Date') }}:</label>
                              <input type="text" readonly class="form-control-plaintext" id="input-date" :value="timeslot.date">
                            </div>
                            <div class="form-group">
                              <label for="input-time">{{ __('Time') }}:</label>
                              <input type="text" readonly class="form-control-plaintext" id="input-time" :value="timeslot.time">
                            </div>
                            <div class="form-group">
                              <label for="input-name">{{ __('Nickname') }}:</label>
                              <input type="text" class="form-control" id="input-name" name="name" placeholder="{{ __('Nickname') }}" required>
                            </div>
                            <div class="form-group">
                              <label for="input-phone">{{ __('Tel.') }}:</label>
                              <input type="tel" pattern="+?[ 0-9]{8,18}" class="form-control" id="input-phone" name="phone" aria-describedby="phoneHelp" placeholder="{{ __('Phone number') }}">
                              <small id="phoneHelp" class="form-text text-muted">{{ __('The Tel. No. for urgent re-arrangement ONLY') }}</small>
                            </div>
                            <!--<div class="form-group">
                              <label for="input-message">{{ __('Message for staff') }}:</label>
                              <textarea class="form-control" id="input-message" name="message" placeholder="Optional message for staff" rows="3" max-rows="6"></textarea>
                            </div>-->
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Go back') }}</button>
                              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
