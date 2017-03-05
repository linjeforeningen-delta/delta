{{--
  Template Name: Avismal
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) <?php the_post(); ?>
    @while(have_rows('typer')) <?php the_row(); ?>
      <div class="seksjon seksjon--medkom">
        <div class="seksjon__medkomholder">
          <div class="seksjon__holder">
            <h1>Δ<span>{{ the_sub_field('tittel') }}</span></h1>
          </div>
        </div>
      </div>
      <div class="seksjon">
        <div class="seksjon__holder">
          <h1>{{ the_sub_field('overskrift') }}</h1>
          @if(get_sub_field('tekst'))
            <div class="seksjon__overtekst">
              {!! get_sub_field('tekst') !!}
            </div>
          @endif
          <div class="trippel">
          <?php $args = ['post_type' => get_sub_field('post_type'), 'posts_per_page' => 3];
            $query = new WP_Query($args);
            while($query->have_posts()): $query->the_post();
          ?>
          @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
          <?php 
            endwhile;
            wp_reset_postdata();
          ?>
            </div>
            <div class="seksjon__lenke">
              <a href="{{ get_post_type_archive_link( get_sub_field('post_type') ) }}">Se flere</a>
            </div>
          </div>
        </div>
      </div>
    @endwhile
  @endwhile
@endsection
