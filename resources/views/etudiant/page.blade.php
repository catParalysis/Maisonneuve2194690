@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')
        <div class="row pt-2">
            <div class="col-12 text-center">
                <h1 class="display-3 mt-4">
                    @lang('lang.text_liste_etudiants') 
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
        <hr>
        <div class="col-10 rounded-3 bg-white p-3 mx-auto">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th class='fs-5'>@lang('lang.text_nom_eleve')</th>
                        <th class='fs-5'>@lang('lang.text_email')</th>
                        <th class='fs-5'>@lang('lang.text_date_naissance')</th>
                        <th class='fs-5'>@lang('lang.text_adresse')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($etudiants as $etudiant)
                    <tr>
                        <td><a class="text_color-blue" href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->nom }} </a></td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->date_naissance }}</td>
                        <td>{{ $etudiant->etudiantHasVille->nom }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $etudiants }}
        </div>
    
</div>
@endsection