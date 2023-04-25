@extends('layouts.app')
@section('title', 'Forum - Modifier')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-5">
                @lang('lang.text_modifier_article')
            </h1>
        </div>
        <!--/col-12-->
    </div>
    <!--/row-->
    <hr>
    <div class="d-flex text_color-blue justify-content-center">
        <div class="col-md-6 rounded-3 bg-white p-3">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        @lang('lang.text_nouveau_blog')
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5 ">
                            <div class="form-check ml-2">
                                <input class="form-check-input" checked type="checkbox" name="toggle_fr" id="toggle_fr">
                                <label class="form-check-label" for="toggle_fr">
                                    @lang('lang.text_ecrire_francais')
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" name="toggle_en" id="toggle_en">
                                <label class="form-check-label" for="toggle_en">
                                    @lang('lang.text_ecrire_anglais')
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            </span>
            <div class="card-body">
                <div id="french-fields" style="display: block">
                    <h5 class="text-center mt-3" >@lang('lang.text_francais')</h5>
                    <div class="control-group col-12">
                        <label for="title">@lang('lang.text_titre_message')</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ $forumPost->title ?? '' }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group col-12">
                        <label for="message">@lang('lang.text_que_voulez_vous_dire')</label>
                        <textarea class="form-control text-start" id="body" name="body">
                                    {{ $forumPost->body ?? '' }}
                                    </textarea>
                        @error('body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <hr>
                <div id="english-fields" style="display: block">
                <h5 class="text-center mt-3" >@lang('lang.text_anglais')</h5>

                    <div class="control-group col-12">
                        <label for="title_en">@lang('lang.text_titre_message')</label>
                        <input type="text" id="title_en" name="title_en" class="form-control"
                            value="{{ $forumPost->title_en ?? '' }}">
                        @error('title_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group col-12">
                        <label for="body_en">@lang('lang.text_que_voulez_vous_dire')</label>
                        <textarea class="form-control text-start" id="body_en" name="body_en">
                                {{ $forumPost->body_en ?? '' }}
                                </textarea>
                        @error('body_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">
                <div class="col-6">
                    <input type="submit" class="mt-2 btn btn-success">
                </div>
                <div class="col-6">
                    <input type="button" class="mt-2 btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
                        value="Effacer">
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_delete')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @lang('lang.text_verif_delete') {{ $forumPost->title ?? $forumPost->title_en }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_fermer')</button>
                    <form  action="{{ route('forum.destroy', $forumPost->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="@lang('lang.text_delete')">
                    </form>
                </div>
            </div>
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
