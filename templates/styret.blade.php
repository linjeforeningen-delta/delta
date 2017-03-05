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
  @endwhile
@endsection
