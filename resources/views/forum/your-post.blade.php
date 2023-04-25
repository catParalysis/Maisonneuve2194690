@extends('layouts.app')
@section('title', __('lang.text_vos_post'))
@section('content')
    <div>
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">
                @lang('lang.text_vos_post')
            </h1>
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        <div class="col-8 rounded-3 bg-white p-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center display-7">@lang('lang.text_clic_pour_modif')</h2>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse($forums as $forum)
                            <li> <a href="{{ route('forum.edit', $forum->id) }}">{{ $forum->title ?? $forum->title_en }}</a> 
                            </li>
                        @empty
                            <li class="text-danger">@lang('lang.text_not_to_show')</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
