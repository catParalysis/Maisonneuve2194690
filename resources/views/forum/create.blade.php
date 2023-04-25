@extends('layouts.app')
@section('title', 'Forum - Create')
@section('content')
        <div class="col-12 text-center pt-2">
            <h1 class="display-5">
                @lang('lang.text_creer_article')
            </h1>
        </div>
        <!--/col-12-->
    </div>
    <!--/row-->

    <div class="d-flex text_color-blue justify-content-center ">
        <div class="col-md-6 rounded-3 bg-white p-3">
            <div class="card">
                <form method="post">
                    @csrf
                    
                    <div class="card-header text-center">
                        @lang('lang.text_nouveau_blog')
                    </div>
                    <div class="row">
                    
                        <div class="col-1"></div>
                        <div class="col-5 ">
                            <div class="form-check ml-2">
                                <input class="form-check-input " type="checkbox" name="toggle_fr" id="toggle_fr">
                                <label class="form-check-label" for="toggle_fr">
                                    @lang('lang.text_ecrire_francais')
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="toggle_en" id="toggle_en">
                                <label class="form-check-label" for="toggle_en">
                                        @lang('lang.text_ecrire_anglais')
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            </span>
            <div class="card-body">
                <div id="french-fields" style="display: none">
                    <h5 class="text-center mt-3" >@lang('lang.text_francais')</h5>
                    <div class="control-group col-12">
                        <label for="title">@lang('lang.text_titre_message') </label>
                        <input type="text" id="title" name="title" class="form-control">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group col-12">
                        <label for="message">@lang('lang.text_que_voulez_vous_dire')</label>
                        <textarea class="form-control" id="body" name="body"></textarea>
                        @error('body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div id="english-fields" style="display: none">
                    <h5 class="text-center mt-3">@lang('lang.text_anglais')</h5>
                    <div class="control-group col-12">
                        <label for="title_en">@lang('lang.text_titre_message')</label>
                        <input type="text" id="title_en" name="title_en" class="form-control">
                        @error('title_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group col-12">
                        <label for="body_en">@lang('lang.text_que_voulez_vous_dire')</label>
                        <textarea class="form-control" id="body_en" name="body_en"></textarea>
                        @error('body_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="mt-2 btn btn-success" value="@lang('lang.text_envoi')">
            </div>
        </div>
        </form>
    </div>
    </div>

    <script>
        const englishToggle = document.getElementById('toggle_en');
        const englishFields = document.getElementById('english-fields');

        englishToggle.addEventListener('change', function() {
            if (englishToggle.checked) {
                englishFields.style.display = 'block';
            } else {
                englishFields.style.display = 'none';
            }
        });
        const frenchToggle = document.getElementById('toggle_fr');
        const frenchFields = document.getElementById('french-fields');

        frenchToggle.addEventListener('change', function() {
            if (frenchToggle.checked) {
                frenchFields.style.display = 'block';
            } else {
                frenchFields.style.display = 'none';
            }
        });
    </script>
@endsection
