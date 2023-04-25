@extends('layouts.app')
@section('title', $etudiant->nom)
@section('content')

<div class="d-flex justify-content-center mt-3 mb-2"">
  <div class="card" style="width: 45vw;">
    <div class="card-body">
      <h5 class="card-title mb-2">@lang('lang.text_nom_eleve') : {{ $etudiant->nom }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">@lang('lang.text_ville_eleve') : {{ $etudiant->etudiantHasVille->nom }}</h6>
      <h6 class="card-subtitle text-muted">@lang('lang.text_date_naissance') : {{ $etudiant->date_naissance }}</h6>
      <p class="card-text mt-3">@lang('lang.text_rejoindre')</p>
      <a href="#" class="card-link">{{ $etudiant->phone }}</a>
      <a href="#" class="card-link">{{ $etudiant->email }}</a>
      @if (session('auth_id') === $etudiant->id)
         <div class="d-flex justify-content-end ">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-success">@lang('lang.modifier')</a>
            <input type="button" value="@lang('lang.text_delete')" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-danger btn-sm">
        </div>
      @endif
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_delete')?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $etudiant->nom }}, @lang('lang.text_destroy_student') 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_fermer')</button>
        <form  method="post">
        @csrf
        @method('DELETE')
      <input type="submit" value="@lang('lang.text_delete')"class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
<div class='spacer'  style="height: 90vh;"></div>

@endsection