@extends('layouts.app')
@section('title', 'Ajouter document')
@section('content')
<div class="d-flex justify-content-center">
<div class="col-4">
<form method="POST" action="{{ route('document.create') }}" enctype="multipart/form-data">
  @csrf
   <div class="control-group col-12">
      <label for="title">@lang('lang.text_title') </label>
      <input type="text" id="title" name="title" class="form-control">
      @error('title')
          <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">@lang('lang.text_select_file') :</label>
    <input type="file" class="form-control form-control-lg" id="file" name="file">
  </div>
  <button type="submit" class="btn btn-primary btn-lg">@lang('lang.text_televerser')</button>
</form>
</div>
</div>
@endsection
