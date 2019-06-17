@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-join-us">
                    <!--<img src="{{ asset('images/join_us_' . $locale . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ __('Join Us') }}</h4>
                </div>

                <div class="card-body bg-join-us-light">
                    @if (app()->isLocale('en'))
                        <p>Volunteer Recruitment</p><br>
                        <p>*Outdoor Volunteer<br>Visit MSM bar, disco and Sauna where distribute Safer Sex Kit and AIDS prevention messages</p>
                        <p>*Conduct HIV Testing Volunteer<br>Conduct HIV Testing in our Causeway Bay Centre and other MSM Venues</p>
                        <p>*Activities Organizer<br>Activity Leader who is open minded, creative, having leading skills in a 8 - 10 particitpants group.</p><br><br>
                        <p>We will provide Proper Training</p>
                        <p>Take Action now and be one of our volunteers</p>
                        <p>Interested party can call (852) 3116 7204 or email to abackuphk@gmail.com. Please mention your interested job. We will contact you as soon as possible.</p>
                    @else
                        <p>招募：義工</p><br>

                        <p>*戶外展翅義務工作人員數名<br>於名大同志酒吧、桑拿地點派發安全套禮物包和有關同志預防知識。</p>

                        <p>*快速測試(HIV Testing)義工數名<br>於本會所/同志酒吧/同志桑拿?助進行愛滋病病毒抗體測試及輔導服務。</p>

                        <p>*活動策劃者數名<br>有創新，有主見，有獨立思老能力，並可以獨自處理並帶領團體進行小組活動</p>


                        <p>（上述職位均有訓練）</p>

                        <p>立即坐言起行，成為"A-Backup"義工一份子, 有興趣人士, 請填妥在網上之義工申請表。如有查詢，請致電(852) 3116 7204, 或電郵致：<a href="mailto: abackuphk@gmail.com">abackuphk@gmail.com<a>, 請注明你有興趣的義工工作, 並寫上你的姓名, 電郵地址和聯絡電話。我們的工作人員會盡快與你聯絡。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
