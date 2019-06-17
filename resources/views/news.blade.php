@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-news">
                    <!--<img src="{{ asset('images/news_' . app()->getLocale() . '.png') }}" width="199" heigth="99">-->
                    <h4 class="mb-0">{{ __('News') }}</h4>
                </div>

                <div class="card-body bg-news-light">
		    @foreach ($newsPosts as $newsPost)
		        <div class="py-4">
                            <div>{!! html_entity_decode($newsPost->content) !!}</div>
                            <div><small><i class="fa fa-user" aria-hidden="true"></i> By A-Backup | <i class="fa fa-calendar" aria-hidden="true"></i> {{ (new Carbon\Carbon($newsPost->created_at))->isoFormat('LL') }}</small></div>
                        </div>
                    @endforeach
                    <div>{{ $newsPosts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
