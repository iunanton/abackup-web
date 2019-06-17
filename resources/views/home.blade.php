@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Test Booking</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <calendar lang="zh">
                        <template slot-scope="props">
                            <span class="btn btn-link btn-tn"
                                v-for='event in slotEvents({!! json_encode($data) !!}, props.date)'
                                @click.stop="onClick(event)">
                                    @{{ event.default_timeslot.time.slice(0,5) }}
                            </span>
                        </template>
                    </calendar>

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
                            <input type="text" readonly class="form-control-plaintext" id="input-time" :value="timeslot.default_timeslot.time.slice(0,5)">
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
