@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-rapid-test">
                    <!--<img src="{{ asset('img/rapid_test_' . app()->getLocale() . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ __('Rapid-Tests') }}</h4>
                </div>

                <div class="card-body bg-rapid-test-light">
                    @if (app()->isLocale('en'))
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 text-center">
                                    <p><strong>HIV Test / AIDS Test</strong></p>
                                    <p>A-Backup Testing Centre opens Monday to Sunday and Public Holidays, and provided Free, Anonymous HIV and STD test. Only take a drop of blood and the result will come out within 15 minutes. All test are conducted in private and result will remain Anonymous.</p>
                                    <figure class="figure text-center">
                                        <img src="{{ asset('img/tail_3.jpg') }}" class="figure-img img-fluid rounded" alt="Rapid Test" width=212 height=156>
                                        <figcaption class="figure-caption">Booking Hotline：3116 7204 (Note: after 3 pm will be answered)</figcaption>
                                    </figure>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-danger">{{ __('SUN') }}</th>
                                                <th class="bg-success">{{ __('MON') }}</th>
                                                <th class="bg-success">{{ __('TUE') }}</th>
                                                <th class="bg-success">{{ __('WED') }}</th>
                                                <th class="bg-success">{{ __('THU') }}</th>
                                                <th class="bg-success">{{ __('FRI') }}</th>
                                                <th class="bg-warning">{{ __('SAT') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7"><br><br><p class="text-center">15:30-21:30</p><p class="text-center">Walk-in are welcomed 15:30 - 21:30</p><br><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7"><br><p class="text-center">Please make reservation for Public Holidays service</p><p class="text-center">Service Hour 15:30 - 21:30</p><p class="text-center">Please call <strong>3116 7204</strong> or <a href="{{ route('test-booking', app()->getLocale()) }}">Web Booking</a> for reservation</p><br></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Most Convenient Way>>><a href="{{ route('test-booking', app()->getLocale()) }}">Click in for Web Booking</a></p><br>
                                    <p>Room A1 11 Floor East South Building, 475 - 481 Hennessy Road, Causeway Bay Hong Kong Island<br>(Near Causeway Bay Plaza One)</p>
                                </div>
                                <div class="col-lg-5">
                                    <iframe width="406" height="519" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.tw/maps/ms?ie=UTF8&amp;hl=en-US&amp;oe=UTF8&amp;msa=0&amp;msid=100599515895528955587.00045ea5e716690452239&amp;s=AARTsJpyAEZZ_4fKnkYEyoxNyB-nKata8w&amp;ll=22.280293,114.182437&amp;spn=0.001288,0.001089&amp;z=19&amp;output=embed"></iframe><br><small><a href="http://maps.google.com.tw/maps/ms?ie=UTF8&amp;hl=zh-TW&amp;oe=UTF8&amp;msa=0&amp;msid=100599515895528955587.00045ea5e716690452239&amp;ll=22.280293,114.182437&amp;spn=0.001288,0.001089&amp;z=19&amp;source=embed" style="color:#0000FF;text-align:left">Click in for larger map</a></small>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 text-center">
                                    <p><strong>愛滋病測試 / HIV測試</strong></p>
                                    <p>支援社A-Backup 逢星期一至日及公眾假期為提供免費不記名愛滋病測試及其他性病測試，只需拮一下手指，15分鐘就有結果！所有測試過程及結果絕對保密。</p>
                                    <figure class="figure text-center">
                                        <img src="{{ asset('img/tail_3.jpg') }}" class="figure-img img-fluid rounded" alt="Rapid Test" width=212 height=156>
                                        <figcaption class="figure-caption">熱線電話：3116 7204 (注意: 於下午三時後才會有人接聽)</figcaption>
                                    </figure>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-danger">{{ __('SUN') }}</th>
                                                <th class="bg-success">{{ __('MON') }}</th>
                                                <th class="bg-success">{{ __('TUE') }}</th>
                                                <th class="bg-success">{{ __('WED') }}</th>
                                                <th class="bg-success">{{ __('THU') }}</th>
                                                <th class="bg-success">{{ __('FRI') }}</th>
                                                <th class="bg-warning">{{ __('SAT') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7"><br><br><p class="text-center">15:30-21:30</p><p class="text-center">可親臨本中心即場安排測試</p><p class="text-center">(無預約停止派籌時間 21:30)</p><br><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7"><br><p class="text-center">服務時間 Service Hour 15:30 - 21:30</p><p class="text-center">請電 Tel <strong>3116 7204</strong> 或 <a href="{{ route('test-booking', app()->getLocale()) }}">網上預約 </a></p><br></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>最快捷方便>>><a href="{{ route('test-booking', app()->getLocale()) }}">按此網上預約</a></p><br>
                                    <p><strong>銅鑼灣軒尼斯道 475 - 481號東南大廈 11 樓 A1 室</strong> (近銅鑼灣廣場1期)</p>
                                </div>
                                <div class="col-lg-5">
                                    <iframe width="406" height="519" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.tw/maps/ms?ie=UTF8&amp;hl=en-US&amp;oe=UTF8&amp;msa=0&amp;msid=100599515895528955587.00045ea5e716690452239&amp;s=AARTsJpyAEZZ_4fKnkYEyoxNyB-nKata8w&amp;ll=22.280293,114.182437&amp;spn=0.001288,0.001089&amp;z=19&amp;output=embed"></iframe><br><small><a href="http://maps.google.com.tw/maps/ms?ie=UTF8&amp;hl=zh-TW&amp;oe=UTF8&amp;msa=0&amp;msid=100599515895528955587.00045ea5e716690452239&amp;ll=22.280293,114.182437&amp;spn=0.001288,0.001089&amp;z=19&amp;source=embed" style="color:#0000FF;text-align:left">Click in for larger map</a></small>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
