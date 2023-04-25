<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Regna
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class=" d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div id="logo">
                <a href="{{ url('/') }}"><img style="width: 55px;" src="{{ asset('assets/img/logo.png') }}"
                        alt=""></a>
            </div>
            @php $lang =  session('locale') @endphp
            <nav id="navbar" class="navbar ">
                <ul>
                    @if (session()->has('auth'))
                        <li class="text-white fst-italic">@lang('lang.text_bienvenue'), @lang('lang.text_vousetesconnect')
                            {{ Auth::user()->name ?? '' }}</li>
                        <li class="flex-grow-1 pe-3"></li>
                    @endif
                    <li><a class="nav-link" href="{{ url('/') }}">@lang('lang.text_accueil')</a></li>
                    <li class="nav-item nav_link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Forum
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('forum.index') }}">Forum</a></li>
                            <li><a class="dropdown-item" href="{{ route('forum.create') }}">@lang('lang.text_creer_article')</a></li>
                            <li><a class="dropdown-item" href="{{ route('forum.your-post') }}">@lang('lang.text_gerer_articles')</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav_link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Documents
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('document.page') }}">@lang('lang.text_liste_documents')</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('document.create') }}">@lang('lang.text_creer_document')</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav_link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('lang.text_etudiants')
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            @if (session()->has('auth'))
                                <li><a class="dropdown-item" href="{{ route('logout') }}">@lang('lang.text_logout')</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('etudiant.show', session('auth_id')) }}">@lang('lang.text_compte')</a>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">@lang('lang.text_login')</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('etudiant.create') }}">@lang('lang.text_create_student')</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('etudiant.page') }}">@lang('lang.text_liste_etudiants')</a></li>
                        </ul>
                    </li>
                    <a class="nav-link @if ($lang == 'fr') text-primary @endif"
                        href="{{ route('lang', 'fr') }}"><i class="flag flag-france"></i></a>
                    <a class="nav-link @if ($lang == 'en') text-primary @endif""
                        href="{{ route('lang', 'en') }}"><i class="flag flag-united-states"></i></a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <div class="container">
        @if (session('success'))
            <div class="row justify-content-center mt-1 mb-1">
                <div class="col-md-6 mt-1 mb-1">
                    <div class="alert alert-success text-center"> {{ session('success') }} </div>
                </div>
            </div>
        @endif

    </div>
    @yield('content')
</body>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Regna</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
