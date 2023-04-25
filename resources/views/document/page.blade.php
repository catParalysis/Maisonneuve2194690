@extends('layouts.app')
@section('title', 'Documents Pagination')
@section('content')
<div>
    <div class="col-12 text-center pt-3">
        <h1 class="display-3 mt-3">
            Documents
        </h1>
    </div>
    <hr>
    <div class="col-8 m-auto">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-3 justify-content-center">
            @foreach($documents as $document)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $document->title ?? $document->title_en}}</h5>
                        <h5 class="card-title">@lang('lang.text_published') {{ $document->documentHasUser->name }}</h5>
                        <p class="card-text">{{ $document->created_at->format('Y-m-d') }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('document.download', ['id' => $document->id]) }}" class="btn btn-primary">@lang('lang.text_download')</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-3">
        {{$documents}}
        </div>
    </div>
</div>

@endsection