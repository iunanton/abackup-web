@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Create News Post</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('news.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="locale" class="custom-control-input" value="zh" checked>
                                <label class="custom-control-label" for="customRadioInline1">繁體</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="locale" class="custom-control-input" value="en">
                                <label class="custom-control-label" for="customRadioInline2">English</label>
                            </div>
                        </div>
                        <div class="form-group">
		            <!--<ckeditor :editor="editor" v-model="content"></ckeditor>
		            <input type="hidden" name="content" :value="content">-->
                            <ckeditor :editor="editor" tag-name="textarea" name="content"></ckeditor>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
