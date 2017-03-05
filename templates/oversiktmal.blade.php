{{--
  Template Name: Oversiktmal
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(has_post_thumbnail())
    <div class="toppbilde">
      {!! get_the_post_thumbnail( null, 'toppbilde' ) !!}
    </div>
    @endif
    <div class="seksjon">
      <div class="seksjon__holder">
        <hgroup>
        @if( get_field('alternativ_overskrift') )
          <h1>{{ get_field('alternativ_overskrift') }}</h1>
        @else
          <h1>{{get_the_title() }}</h1>
        @endif
          <h2>{{ get_field('underoverskrift') }}</h2>
        </hgroup>
        <div class="oversikt">
        @while(have_rows('bokser')) @php(the_row())
          <a href="{{ get_sub_field('side') }}">
            <div class="oversikt__ikon {{ get_sub_field('ikon') }}">
            </div>
            <div class="oversikt__tekst">
              <h3>{{ get_sub_field('tekst') }}</h3>
            </div>
          </a>
        @endwhile
        </div>
      </div>
    </div>
  @endwhile
@endsection
