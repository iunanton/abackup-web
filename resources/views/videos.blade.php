@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-videos">
                    <!--<img src="{{ asset('images/videos_' . $locale . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ _('Videos') }}</h4>
                </div>

                <div class="card-body bg-videos-light">
                    @if (app()->isLocale('en'))
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>2014/12/22</td>
                                    <td>Coming Soon</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Coming Soon</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><iframe src="//www.youtube.com/embed/oV7o3njVuEk?rel=0" allowfullscreen="" width="640" height="360" frameborder="0"></iframe></td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>2014/12/22</td>
                                    <td>Coming Soon</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>快將推出</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><iframe src="//www.youtube.com/embed/oV7o3njVuEk?rel=0" allowfullscreen="" width="640" height="360" frameborder="0"></iframe></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
