{{--
  Template Name: Wikiside
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
  <div class="seksjon">
    <div class="seksjon__holder">
      @if(Delta\bruker_har_tilgang('skjulte'))
        <h1>{{ the_title() }}</h1>
        @while(have_rows('felt')) @php(the_row())
          <div class="wikiside">
            @if(get_sub_field('bilde'))
            <div class="wikiside__bilde">
              {!! wp_get_attachment_image( get_sub_field('bilde'), 'enkeltbilde' ) !!}
            </div>
            @endif
            <div class="wikiside__tekst">
              {!! get_sub_field('innhold') !!}
        @endwhile
          </div>
        </div>
      @else
      <h1>Denne siden er kun for medlemmer av deltas komiteer</h1>
      @endif
      </div>
    </div>
  @endwhile
@endsection
