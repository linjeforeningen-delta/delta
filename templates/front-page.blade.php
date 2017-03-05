@extends('layouts.base')

@section('content')
  @if(have_posts()) <?php the_post(); ?>
  <div class="seksjon seksjon--bg" style="background-image: url( {{ the_post_thumbnail_url( 'full' ) }} )">
  </div>
  <div class="seksjon seksjon--gronn">
    <div class="seksjon__holder">
      <h1>Bedriftspresentasjoner</h1>
      @include('partials.bedriftspresentasjoner')
    </div>
  </div>

  <div class="seksjon">
    <div class="seksjon__holder">
      <h1>Kompendier</h1>
      @include('partials.kompendier')
    </div>
  </div>

  <div class="seksjon seksjon--gronn">
    <div class="seksjon__holder">
      <h1>Nyheter</h1>
      @include('partials.nyheter')
    </div>
  </div>

  <div class="seksjon">
    <div class="seksjon__holder">
      <h1>Samarbeidspartnere</h1>
      @include('partials.samarbeidspartnere')
    </div>
  </div>
@endif
@endsection
