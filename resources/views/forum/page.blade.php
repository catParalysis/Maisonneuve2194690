@extends('layouts.app')
@section('title', 'Forum - Pagination')
@section('content')
        <div class="col-12 text-center">
            <h1 class="display-3 text_color-blue mt-3">
                Maisonneuve--2194690
            </h1>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
        <div class="col-8 rounded-3 bg-white p-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class='fs-5'>@lang('lang.text_title')</th>
                        <th class='fs-5'>@lang('lang.text_date')</th>
                        <th class='fs-5'>@lang('lang.text_auteur')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forums as $forum)
                    <tr>
                        <td><a class="text_color-blue fw-bolder" href="{{route('forum.show', $forum->id)}}">{{ $forum->title ?? $forum->title_en}}</a></td>
                        <td>{{ $forum->created_at->format('Y-m-d') }}</td>
                        <td>{{ $forum->forumHasUser->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$forums}}
        </div>
</div>
@endsection