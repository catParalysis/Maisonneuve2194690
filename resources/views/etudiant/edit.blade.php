@extends('layouts.app')
@section('title', 'Etudiant - Modification')
@section('content')
<div class="row">
    <div class="col-12 text-center pt-2">
        <h1 class="display-one">
            Modifications du dossier de {{ $etudiant->nom }}
        </h1>
    </div> <!--/col-12-->
</div><!--/row-->
        <hr>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form method="post">
            @csrf
            @method('PUT')
                <div class="card-header">
                    @lang('lang.text_chaque_champ')                    
                </div>
                <div class="card-body">   
                        <div class="control-grup col-12">
                            <label for="nom">@lang('lang.text_nom_eleve') : </label>
                            <input type="text" id="nom" value="{{ $etudiant->nom }}" name="nom" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="date_naissance">@lang('lang.text_date_naissance') : </label>
                            <input type="text" id="date_naissance" value="{{ $etudiant->date_naissance }}" name="date_naissance" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="adresse">@lang('lang.text_adresse') : </label>
                            <input type="text" id="adresse" value="{{ $etudiant->adresse }}" name="adresse" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="email">@lang('lang.text_email') : </label>
                            <input type="text" id="email" value="{{ $etudiant->email }}" name="email" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="phone">@lang('lang.text_telephone') : </label>
                            <input type="text" id="phone" value="{{ $etudiant->phone }}" name="phone" class="form-control">
                        </div>
                        <div class="control-grup col-12 mt-2">
                            <label for="ville">@lang('lang.text_ville_eleve') : </label>
                            <select name="ville">
                                @foreach ($villes as $ville)
                                    <option class="form-control" {{ $ville === $etudiant->etudiantHasVille->nom ? "selected" : '' }} value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Soumettre" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
<div class='spacer'  style="height: 18vh;"></div>
@endsection
