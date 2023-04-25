@extends('layouts.app')
@section('title', 'Forum')
@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-8 rounded-3 bg-white p-3">
            <hr>
            <p>
                @php
                    if (session('locale') === 'en') {
                        $title = 'title_en';
                        $body = 'body_en';
                    } else {
                        $title = 'title';
                        $body = 'body';
                    }
                @endphp
                @lang('lang.text_auteur') : {{ $forumPost->forumHasUser->name }}
            </p>
            <p> @lang('lang.text_title') : 
            </p>
            <p>{{ $forumPost->$title ?? __('lang.text_switch_lang') }}</p>
            <p>
                @lang('lang.text_body') : 
            </p>
            <p>{{ $forumPost->$body ?? __('lang.text_switch_lang')}}</p>
            <hr>
            <a href="{{ route('forum.index') }}" class="btn btn-primary btn-sm">@lang('lang.text_retour')</a>
        </div>
    </div>


@endsection
