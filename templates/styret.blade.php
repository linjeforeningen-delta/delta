{{--
  Template Name: Styret
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="toppbilde">
      {!! get_the_post_thumbnail( null, 'full' ) !!}
    </div>
    @if(have_rows('styremedlemmer'))
      @php($i = 0)
      @while(have_rows('styremedlemmer')) @php(the_row())
        @if($i == 0)
        <div class="seksjon">
          <div class="seksjon__holder">
            <h1>{{ get_the_title() }}</h1>
        @else
        <div class="seksjon seksjon--gronn-topp">
          <div class="seksjon__holder">
        @endif
              @include('partials.styremedlem')
          </div>
        </div>
        @php($i++)
      @endwhile
    @endif
    @if(have_rows('tidligere_styre'))
    <?php $halvveis = count( get_field('repeater_field') ) / 2; $i = 0; ?>
      <section class="seksjon">
        <div class="seksjon__holder">
          <h2>{{get_field('overskrift_tidligere') }}</h2>
          <div class="trekkspill__holder">
          <div class="trekkspill">
          @while(have_rows('tidligere_styre'))<?php the_row(); ?>
            <div class="trekkspill__enkelt">
              <h3>{{get_sub_field('overskrift')}}</h3>
              <div class="trekkspill__enkelt__innhold">
                @if(get_sub_field('bilde'))
                  <div class="trekkspill__enkelt__bg">
                    {!! wp_get_attachment_image( get_sub_field('bilde'), 'large' ) !!}
                  </div>
                @endif
                <div class="trekkspill__enkelt__tekst">
                  {!! get_sub_field('tekst') !!}
                </div>
              </div>
            </div>
            @if($i > $halvveis)
            <?php $i = 0; ?>
            </div>
            <div class="trekkspill trekkspill--andre">
            @endif
            <?php $i++; ?>
          @endwhile
          </div>
          </div>
        </div>
      </section>
    @endif
  @endwhile
@endsection
