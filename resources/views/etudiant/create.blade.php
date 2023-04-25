@extends('layouts.app')
@section('title', 'Etudiant - Creation')
@section('content')

    <div class="col-12 text-center pt-2">
        <h1 class="display-one">
            @lang('lang.text_creation_etudiant')
        </h1>
    </div> <!--/col-12-->

        <hr>
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form method="post">
            @csrf
            @method('put')
                <div class="card-header">
                    @lang('lang.text_chaque_champ')
                </div>
                <div class="card-body">   
                        <div class="control-group col-12 mt-3">
                            <label for="nom">@lang('lang.text_nom_eleve') : </label>
                            <input type="text" id="nom" name="nom" class="form-control">
                        </div>
                        <div class="control-group col-12 mt-3">
                            <label for="date_naissance">@lang('lang.text_date_naissance') : </label>
                            <input type="text" id="date_naissance"  name="date_naissance" class="form-control">
                        </div>
                        <div class="control-group col-12 mt-3">
                            <label for="adresse">@lang('lang.text_adresse') : </label>
                            <input type="text" id="adresse"  name="adresse" class="form-control">
                        </div>
                        <div class="control-group col-12">
                            <label for="email">@lang('lang.text_email') : </label>
                            <input type="text" id="email"  name="email" class="form-control">
                        </div>
                         <div class="control-group col-12 mt-3">
                                <label for="password">@lang('lang.text_password') :</label>
                                <input type="text" id="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="control-group col-12 mt-3">
                            <label for="phone">@lang('lang.text_telephone') : </label>
                            <input type="text" id="phone"  name="phone" class="form-control">
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="ville">@lang('lang.text_ville_eleve') : </label>
                            <select name="ville">
                                @foreach ($villes as $ville)
                                    <option class="form-control" value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="@lang('lang.text_envoi')" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
<div class='spacer'  style="height: 18vh;"></div>
@endsection
