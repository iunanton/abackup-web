@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-about-us">
                    <!--<img src="{{ asset('images/about_us_' . app()->getLocale() . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ __('About Us') }}</h4>
                </div>

                <div class="card-body bg-about-us-light">
                    @if (app()->isLocale('en'))
                        <p>A-backup is a Non-Profit and Non-Governmental Organization (NGO) which advocates for AIDS prevention. We are funded by AIDS TRUST FUND and established our free HIV testing center in Causeway Bay. We provide education about AIDS/ STDs prevention and distribute Condoms at various gay venues, such as bars and karaokes. Our group gatherings provide a safe environment which give participants a sense of belonging and a chance for positive self development. We care about our community!</p>
                    @else
                        <p><strong>支援社A-Backup</strong>是由愛滋病信託基金(AIDS TRUST FUND)贊助的同志非牟利志願團體， 並於銅鑼灣測試中心提供免費愛滋病病毒抗體和性病測試服務， 及外展到一些男同志熱點(如酒吧或卡拉OK等)宣傳預防愛滋病/性病及派發安全套。</p>
                        <p>本團體設有會員小組舉辦各項活動，令會員建立正面自我形象，關懷社群!</p><br>
                        <p><strong>設有免費測試HIV服務 Tel: 31167204</strong></p><br>
                        <p>星期一至五開放時間 15:30 - 21:30(無需預約)</p>
                        <p>(無預約停止派籌時間 21:30)</p>
                        <p>星期六 / 日15:30 - 21:30 (敬請預約)</p>
                        <p>公眾假期 15:30 - 21:30 (敬請預約)</p><br>

                        <p><strong>銅鑼灣軒尼詩道475-481東南大廈 11樓 A1 室</strong>(近銅鑼灣廣場1期)</p><br>
                        <p>Email 電郵地址：<a href="mailto: abackuphk@gmail.com">abackuphk@gmail.com</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
