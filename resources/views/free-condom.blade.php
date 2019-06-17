@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-free-condom">
                    <!--<img src="{{ asset('images/free_condom_' . $locale . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ _('Free Condom') }}</h4>
                </div>

                <div class="card-body bg-free-condom-light">
                    @if (app()->isLocale('en'))
                        <div class="containter">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/36_set_b.jpg') }}" class="figure-img img-fluid rounded" alt="36_set_b" width=212 height=156>
                                        <figcaption class="figure-caption">36 sets of Safer Sex Kits</figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/72_set_a.jpg') }}" class="figure-img img-fluid rounded" alt="72_set_a" width=212 height=156>
                                        <figcaption class="figure-caption">72 sets of Safer Sex Kits</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/144_set_b.jpg') }}" class="figure-img img-fluid rounded" alt="144_set_b" width=212 height=156>
                                        <img src="{{ asset('img/144_set_aa.jpg') }}" class="figure-img img-fluid rounded" alt="144_set_aa" width=212 height=156>
                                        <figcaption class="figure-caption">144 sets of Safer Sex Kits</figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/KY_OK.png') }}" class="figure-img img-fluid rounded" alt="KY_OK" width=212 height=250>
                                        <figcaption class="figure-caption"></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div><br>
                        <p class="text-center">Take your pick our free Safer Sex Kits</p>
                        <p class="text-center">Protect yourself, practicing Safer Sex</p>
                        <p class="text-center">Taking regular HIV test</p>
                    @else
                        <div class="containter">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/36_set_b.jpg') }}" class="figure-img img-fluid rounded" alt="36_set_b" width=212 height=156>
                                        <figcaption class="figure-caption">36套裝</figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/72_set_a.jpg') }}" class="figure-img img-fluid rounded" alt="72_set_a" width=212 height=156>
                                        <figcaption class="figure-caption">72個套裝</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/144_set_b.jpg') }}" class="figure-img img-fluid rounded" alt="144_set_b" width=212 height=156>
                                        <img src="{{ asset('img/144_set_aa.jpg') }}" class="figure-img img-fluid rounded" alt="144_set_aa" width=212 height=156>
                                        <figcaption class="figure-caption">144個套裝</figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-6 text-center">
                                    <figure class="figure">
                                        <img src="{{ asset('img/KY_OK.png') }}" class="figure-img img-fluid rounded" alt="KY_OK" width=212 height=250>
                                        <figcaption class="figure-caption"></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div><br>
                        <p class="text-center"><strong>免費提供安全套及潤滑劑，</strong></p>
                        <p class="text-center">緊記保障自己，進行<strong>安全性行為，</strong></p>
                        <p class="text-center">為並定期進行愛滋病病毒抗體測試!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
