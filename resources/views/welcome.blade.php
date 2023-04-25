@extends('layouts.app')
@section('title', 'Maisonneuve-2194690')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Maisonneuve 2194690</h1>
      <h2>@lang('lang.text_unsitesanspretention')</h2>
      <a href="{{ route('etudiant.page') }}" class="btn-get-started">@lang('lang.text_voir_liste')</a>
    </div>
  </section><!-- End Hero Section -->
@endsection