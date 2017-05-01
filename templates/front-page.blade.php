@extends('layouts.base')

@section('content')
  @if(have_posts()) <?php the_post(); ?>
  <div class="seksjon seksjon--bg" style="background-image: url( {{ the_post_thumbnail_url( 'full' ) }} )">
  </div>
<?php
    $args = ['post_type' => 'bedpress', 
            'posts_per_page' => 3,
            'orderby' => 'meta_value_num',
            'meta_key' => 'tidspunkt',
            'meta_query' => [
              'key' => 'tidspunkt',
              'value' => date('c'),
              'type' => 'DATE',
              'compare' => '>=']];
    $bedpresser = new WP_Query($args);
?>
  @if($bedpresser->have_posts())
  <div class="seksjon seksjon--gronn">
    <div class="seksjon__holder">
      <h1>Bedrifts- og forskningspresentasjoner</h1>
      <div class="bedriftspresentasjoner">
        @while ($bedpresser->have_posts()) <?php $bedpresser->the_post(); ?>
          @include ('partials.content-bedpress')
        @endwhile
      </div>
    </div>
  </div>
  @endif

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
