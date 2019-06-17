@php
    app()->setLocale('zh');
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">{{ __('Test Booking') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        $currentFormatted = $currentMonth['date']->format(__('F Y'));
                        $nextFormatted = $nextMonth['date']->format(__('F Y'));
                        $allowTodayBooking = false;
                    @endphp

                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#current" role="tab" aria-controls="current" aria-selected="true" onClick="document.getElementById('monthTitle').innerHTML='{{ $currentFormatted }}'">
                                <i class="material-icons d-block">arrow_back</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#next" role="tab" aria-controls="next" aria-selected="false" onClick="document.getElementById('monthTitle').innerHTML='{{ $nextFormatted }}'">
                                <i class="material-icons d-block">arrow_forward</i>
                            </a>
                        </li>
                        <li class="nav-item mr-auto">
                            <h4 id="monthTitle" class="nav-link mb-0">{{ $currentFormatted }}</h4>
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
                                    @foreach ($currentMonth['grid'] as $week)
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
                                                            <div class="ec-calendar-notice text-center">{{ __("Please call 5405 6631 for today's booking") }}</div>
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
                                    @foreach ($nextMonth['grid'] as $week)
                                        <div class="ec-week">
                                            @foreach ($week as $day)
                                                <div class="ec-day {{ $day['isCurMonth'] ? '' : 'ec-out-calendar' }}">
                                                    <div class="ec-dom {{ $day['isToday'] ? 'ec-today' : '' }}">{{ $day['monthDay'] }}</div>
                                                    @if ($day['isCurMonth'])
                                                        @foreach ($timeslots->filter(function($item) use ($day) { return $item->date === $day['date']->toDateString(); }) as $timeslot)
                                                            <div class="ec-calendar-event" @click.stop="onClick('{{ $timeslot->id }}', '{{ $timeslot->date }}', '{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}')">{{ substr($timeslot->defaultTimeslot->time, 0, 5) }}</div>
                                                        @endforeach
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
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">預約測試</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="input-date">日期:</label>
                            <input type="text" readonly class="form-control-plaintext" id="input-date" :value="timeslot.date">
                          </div>
                          <div class="form-group">
                            <label for="input-time">時間:</label>
                            <input type="text" readonly class="form-control-plaintext" id="input-time" :value="timeslot.time">
                          </div>
                          <div class="form-group">
                            <label for="input-name">暱稱:</label>
                            <input type="text" class="form-control" id="input-name" placeholder="Enter name" required>
                          </div>
                          <div class="form-group">
                            <label for="input-phone">聯絡電話:</label>
                            <input type="tel" pattern="[0-9]{8,12}" class="form-control" id="input-phone" aria-describedby="phoneHelp" placeholder="Enter phone number">
                            <small id="phoneHelp" class="form-text text-muted">The Tel. No. for urgent re-arrangement ONLY.</small>
                          </div>
                          <div class="form-group">
                            <label for="input-message">Message for staff:</label>
                            <textarea class="form-control" id="input-message" placeholder="Optional message for staff" rows="3" max-rows="6"></textarea>
                          </div>
                        </form>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">回上一頁</button>
                            <button type="button" class="btn btn-primary">送出</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
